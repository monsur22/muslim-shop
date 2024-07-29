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

        $products = (new ProductFilter($request))->apply()
            ->with('images', 'category', 'supplier', 'brand', 'store', 'user', 'description', 'quantity')
            ->paginate($perPage);

        return $products;
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

            // Create the product description
            if ($request->filled('quantity')) {
                ProductInventory::create([
                    'product_id' => $product->id,
                    'quantity' => $request->quantity,
                ]);
            }
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
            return $product->load('images', 'category', 'supplier', 'brand', 'store', 'user', 'description', 'inventory', 'stockLevels');
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

        if ($request->filled('quantity')) {
            $product->inventory()->updateOrCreate(
                ['product_id' => $product->id],
                ['quantity' => $request->quantity]
            );

            $product->stockLevels()->updateOrCreate(
                [
                    'product_id' => $product->id,
                    'store_id' => $request->filled('store_id') ? $request->store_id : $product->store_id,
                    'quantity' => $request->quantity, 'last_updated' => now()
                ]
            );
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

        return $product->load('images', 'category', 'supplier', 'brand', 'store', 'user', 'description', 'inventory', 'stockLevels');
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
}
