<?php

namespace App\Services;

use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use App\Models\ProductDescription;
use App\Models\ProductInventory;
use App\Models\StockLevel;
use App\Models\Store;
use App\Models\StoreProduct;
use App\Services\Interfaces\ProductServiceInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductService implements ProductServiceInterface
{
    public function index($request)
    {
        // Get the number of items per page from the request or default to 10
        $perPage = $request->query('per_page', 10);

        // Start building the query for StoreProduct with necessary relationships
        $query = StoreProduct::with([
            'store',
            'product.images',
            'product.category',
            'product.supplier',
            'product.brand',
            'product.user',
            'product.description',
        ]);

        // Apply filters to the query
        $this->applyFilters($query, $request);

        // Fetch filtered results
        $filteredProducts = $query->get();

        // Paginate the flattened collection
        $paginatedProducts = new \Illuminate\Pagination\LengthAwarePaginator(
            $filteredProducts->forPage($request->input('page', 1), $perPage),
            $filteredProducts->count(),
            $perPage,
            $request->input('page', 1),
            ['path' => $request->url(), 'query' => $request->query()]
        );

        return $paginatedProducts;
    }

    protected function applyFilters($query, $request)
    {
        // Define the filters to be applied
        $filters = [
            'product_name' => function ($q, $value) {
                $q->whereHas('product', function ($query) use ($value) {
                    $query->where('name', $value);
                });
            },
            'store_id' => function ($q, $value) {
                $q->where('store_id', $value);
            },
            'category_id' => function ($q, $value) {
                $q->whereHas('product.category', function ($query) use ($value) {
                    $query->where('id', $value);
                });
            },
            'brand_id' => function ($q, $value) {
                $q->whereHas('product.brand', function ($query) use ($value) {
                    $query->where('id', $value);
                });
            },
            'description' => function ($q, $value) {
                $q->whereHas('product.description', function ($query) use ($value) {
                    $query->where('description', 'like', '%' . $value . '%');
                });
            }
        ];

        // Loop through the filters and apply them if present in the request
        foreach ($filters as $filter => $callback) {
            if ($request->has($filter)) {
                $callback($query, $request->input($filter));
            }
        }
    }


    public function createProduct(StoreProductRequest $request)
    {
        DB::beginTransaction();

        try {
            // Create the product
            $product = Product::create($request->all());

            // Create the product description
            if ($request->filled('description')) {
                ProductDescription::create([
                    'product_id' => $product->id,
                    'description' => $request->description,
                ]);
            }

            // Create or update the product inventory
            $quantity = $request->filled('quantity') ? $request->quantity : 0;
            $storeProduct = StoreProduct::updateOrCreate(
                [
                    'product_id' => $product->id,
                    'store_id' => $request->store_id,
                ],
                [
                    'quantity' => $quantity,
                    'visible' => $request->has('visible') ? $request->visible : true,
                ]
            );
            StockLevel::create([
                'product_id' => $storeProduct->id,
                'quantity' => $request->quantity,
                'last_updated' => now(),
            ]);
            // Handle the image file if present
            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('images', 'public');
                $product->images()->create([
                    'url' => $path,
                ]);
            }


            // Commit the transaction
            DB::commit();
            return $product->load('images', 'category', 'supplier', 'brand', 'user', 'description', 'stockLevels');
        } catch (\Exception $e) {
            // Rollback the transaction in case of an error
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function updateProduct(StoreProductRequest $request, StoreProduct $storeProduct)
    {
        $storeProduct->product->update($request->all());

        if ($request->filled('description')) {
            $storeProduct->product->description()->updateOrCreate(
                ['product_id' => $storeProduct->product_id],
                ['description' => $request->description]
            );
        }
        $storeProduct = StoreProduct::where('store_id', $request->store_id)
            ->where('product_id', $storeProduct->product_id)
            ->firstOrFail();
        // Handle quantity and stock level updates
        if ($request->filled('quantity')) {
            $this->updateProductQuantity($request, $storeProduct);
        }
        if ($request->hasFile('image')) {
            if ($storeProduct->product->images()->exists()) {
                Storage::disk('public')->delete($storeProduct->product->images()->first()->url);
                $storeProduct->product->images()->delete();
            }

            $path = $request->file('image')->store('images', 'public');
            $storeProduct->product->images()->create([
                'url' => $path,
            ]);
        }

        return $storeProduct->load('product.images', 'product.category', 'product.supplier', 'product.brand', 'product.user', 'product.description', 'stockLevels');
    }

    public function deleteProduct(Product $product)
    {
        DB::beginTransaction();

        try {
            // Delete images
            if ($product->images()->exists()) {
                $product->images->each(function ($image) {
                    Storage::disk('public')->delete($image->url);
                    $image->delete();
                });
            }

            // Delete description
            if ($product->description()->exists()) {
                $product->description()->delete();
            }
            // store Products
            if ($product->storeProducts()->exists()) {
                $product->storeProducts()->delete();
            }
            // Delete the product
            $product->delete();

            DB::commit();

            return response()->json(['message' => 'Product deleted successfully.'], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Updates the product quantity and adjusts stock levels accordingly.
     *
     * @param StoreProductRequest $request
     * @param Product $product
     * @return void
     */
    public function updateProductQuantity(StoreProductRequest $request, StoreProduct $storeProduct)
    {
        if ($request->filled('quantity')) {
            $newQuantity = $request->quantity;

            // Find the specific StoreProduct instance
            $currentStoreProduct = $storeProduct->where('store_id', $request->store_id)
                ->where('product_id', $storeProduct->product_id)
                ->first();


            if ($currentStoreProduct) {
                // Calculate the difference in quantity
                $quantityDifference = $newQuantity - $currentStoreProduct->quantity;

                // Find the related stock levels for the store product
                $stockLevel = $currentStoreProduct->stockLevels()->first();


                if ($stockLevel) {
                    $stockLevel->update([
                        'quantity' => $stockLevel->quantity + $quantityDifference,
                        'last_updated' => now(),
                    ]);
                } else {
                    // If no stock level exists, create a new one
                    $currentStoreProduct->stockLevels()->create([
                        'product_id' => $storeProduct->id,
                        'store_id' => $request->store_id,
                        'quantity' => $newQuantity,
                        'last_updated' => now(),
                    ]);
                }

                // Update the store product quantity
                $currentStoreProduct->update([
                    'quantity' => $newQuantity,
                    'updated_at' => now(),
                ]);
            } else {
                // If no current store product exists, create a new one
                $newStoreProduct = $storeProduct->create([
                    'product_id' => $storeProduct->id,
                    'store_id' => $request->store_id,
                    'quantity' => $newQuantity,
                    'updated_at' => now(),
                ]);

                // Create a new stock level for the new store product
                $newStoreProduct->stockLevels()->create([
                    'product_id' => $storeProduct->id,
                    'store_id' => $request->store_id,
                    'quantity' => $newQuantity,
                    'last_updated' => now(),
                ]);
            }
        }
    }
}
