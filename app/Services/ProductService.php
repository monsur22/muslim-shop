<?php

namespace App\Services;

use App\Filters\ProductFilter;
use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use App\Models\ProductDescription;
use App\Models\ProductInventory;
use App\Models\StockLevel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductService
{
    public function index($request)
    {
        $perPage = $request->query('per_page', 10);

        // Get products with their stock levels and related stores
        $products = (new ProductFilter($request))->apply()
            ->with(['images', 'category', 'supplier', 'brand', 'user', 'description', 'stockLevels.store'])
            ->get();

        // Flatten the products collection by generating a separate entry for each store
        $productsWithStores = $products->flatMap(function ($product) {
            return $product->stockLevels->map(function ($stockLevel) use ($product) {
                $productClone = clone $product;
                $productClone->stockLevels = [$stockLevel]; // Only keep the current store's stock level
                return $productClone;
            });
        });

        // Paginate the flattened collection
        $paginatedProducts = new \Illuminate\Pagination\LengthAwarePaginator(
            $productsWithStores->forPage($request->input('page', 1), $perPage),
            $productsWithStores->count(),
            $perPage,
            $request->input('page', 1),
            ['path' => $request->url(), 'query' => $request->query()]
        );

        return $paginatedProducts;
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
            ProductInventory::updateOrCreate(
                ['product_id' => $product->id],
                ['quantity' => $quantity]
            );

            StockLevel::create([
                'product_id' => $product->id,
                'store_id' => $request->store_id,
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
            return $product->load('images', 'category', 'supplier', 'brand', 'user', 'description', 'inventory', 'stockLevels');
        } catch (\Exception $e) {
            // Rollback the transaction in case of an error
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function updateProduct(StoreProductRequest $request, Product $product)
    {
        $product->update($request->all());

        if ($request->filled('description')) {
            $product->description()->updateOrCreate(
                ['product_id' => $product->id],
                ['description' => $request->description]
            );
        }

        // Handle quantity and stock level updates
        if ($request->filled('quantity')) {
            $this->updateProductQuantity($request, $product);
        }
        if ($request->hasFile('image')) {
            if ($product->images()->exists()) {
                Storage::disk('public')->delete($product->images()->first()->url);
                $product->images()->delete();
            }

            $path = $request->file('image')->store('images', 'public');
            $product->images()->create([
                'url' => $path,
            ]);
        }

        return $product->load('images', 'category', 'supplier', 'brand', 'user', 'description', 'inventory', 'stockLevels');
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
    public function updateProductQuantity(StoreProductRequest $request, Product $product)
    {
        if ($request->filled('quantity')) {
            $newQuantity = $request->quantity;
            $currentStockLevel = $product->stockLevels()->where('store_id', $request->store_id ?? $product->store_id)->first();
            if ($currentStockLevel) {
                $quantityDifference = $newQuantity - $product->inventory->quantity;
                $currentStockLevel->update([
                    'quantity' => $currentStockLevel->quantity + $quantityDifference,
                    'last_updated' => now(),
                ]);
                $product->inventory()->update([
                    'quantity' => $newQuantity,
                ]);
            } else {
                $product->stockLevels()->create([
                    'product_id' => $product->id,
                    'store_id' => $request->store_id ?? $product->store_id,
                    'quantity' => $newQuantity,
                    'last_updated' => now(),
                ]);

                $product->inventory()->updateOrCreate(
                    ['product_id' => $product->id],
                    ['quantity' => $newQuantity]
                );
            }
        }
    }
}
