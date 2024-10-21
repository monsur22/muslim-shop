<?php

namespace App\Services;

use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Sale;
use App\Models\SalesReturn;
use App\Models\StockLevel;
use App\Services\Interfaces\SalesServiceInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;

class SalesService implements SalesServiceInterface
{
    public function getAllSales()
    {
        return Sale::whereDoesntHave('order', function ($query) {
            $query->where('return_processed', true);
        })->get();
    }

    public function processReturn($sale, $items)
    {
        if ($sale->return_processed) {
            throw new \Exception('Return has already been processed for this sale.');
        }

        $orderItems = $sale->order->items;

        DB::beginTransaction();

        try {
            $totalReturnAmount = 0;

            foreach ($items as $item) {
                $orderItem = $orderItems->where('id', $item['order_item_id'])->first();
                if (!$orderItem) {
                    throw new \Exception('Order item not found in this sale.');
                }

                $quantity = $item['quantity'];
                $amount = $orderItem->price * $quantity;

                $this->createSalesReturn($sale->id, $orderItem->id, $quantity, $amount);
                $this->updateStockLevel($orderItem->product_id, $orderItem->store_id, $quantity);

                $totalReturnAmount += $amount;
            }

            $this->adjustSaleAmount($sale, $totalReturnAmount);

            DB::commit();

            return $sale->refresh();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Product return service error: ' . $e->getMessage());
            throw $e;
        }
    }

    public function createSalesReturn($saleId, $orderItemId, $quantity, $amount)
    {
        SalesReturn::create([
            'sale_id' => $saleId,
            'order_item_id' => $orderItemId,
            'quantity' => $quantity,
            'amount' => $amount,
        ]);
    }

    public function updateStockLevel($productId, $storeId, $quantity)
    {
        $stockLevel = StockLevel::where('product_id', $productId)
            ->where('store_id', $storeId)
            ->first();

        if ($stockLevel) {
            $stockLevel->increment('quantity', $quantity);
        } else {
            StockLevel::create([
                'product_id' => $productId,
                'store_id' => $storeId,
                'quantity' => $quantity,
            ]);
        }
    }

    public function adjustSaleAmount($sale, $totalReturnAmount)
    {
        $sale->update([
            // 'amount' => $sale->amount - $totalReturnAmount,
            'return_processed' => true,
        ]);
    }
    public function getSalesById($id)
    {
        return Sale::find($id);
    }
}
