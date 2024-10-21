<?php

namespace App\Services;

use App\Http\Resources\ProductReturnResource;
use App\Models\ProductInventory;
use App\Models\ProductReturn;
use App\Models\StockLevel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProductReturnService
{
    public function returnProduct($data)
    {
        DB::beginTransaction();

        try {
            // Get the source store's stock level
            $stock = StockLevel::where('product_id', $data['product_id'])
                ->where('store_id', $data['store_id'])
                ->orderBy('id', 'desc')
                ->first();

            if (!$stock || $stock->quantity < $data['quantity']) {
                throw new \Exception('Not enough stock in store');
            }

            // Deduct quantity from source store
            $stock->quantity -= $data['quantity'];
            $stock->last_updated = now();
            $stock->save();

            // Create product return record
            $returnProduct = ProductReturn::create([
                'product_id' => $data['product_id'],
                'store_id' => $data['store_id'],
                'quantity' => $data['quantity'],
                'return_date' => now(),
                'reason' => $data['reason']
            ]);
            // Update product inventory
            $inventory = ProductInventory::where('product_id', $data['product_id'])->first();
            if ($inventory) {
                if ($inventory->quantity < $data['quantity']) {
                    throw new \Exception('Not enough stock in inventory to return to seller');
                }
                $inventory->quantity -= $data['quantity'];
                $inventory->save();
            } else {
                throw new \Exception('Inventory record not found');
            }
            $returnProduct->load('product.supplier', 'store');

            DB::commit();

            return $returnProduct;
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Product return error: ' . $e->getMessage());
            throw $e;
        }
    }
}
