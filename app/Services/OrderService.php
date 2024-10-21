<?php

namespace App\Services;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Sale;
use App\Models\ShippingAddress;
use App\Models\StockLevel;
use App\Services\Interfaces\OrderServiceInterface;
use App\Services\Payments\PaymentProcessor;
use Illuminate\Support\Facades\DB;

class OrderService implements OrderServiceInterface
{
    public function createOrder($user, $items, $paymentMethodId,$paymentMethod,$request,$shippingAddress)
    {

        DB::beginTransaction();
        try {
            // Step 1: Create the order
            $order = Order::create([
                'user_id' => $user->id,
                'total_amount' => 0,
                'status' => 'pending',
                'type' => $request->type,

            ]);
            if ($shippingAddress) {
                ShippingAddress::create([
                    'order_id' => $order->id,
                    'address_line1' => $shippingAddress['address_line1'],
                    'address_line2' => $shippingAddress['address_line2'],
                    'city' => $shippingAddress['city'],
                    'state' => $shippingAddress['state'],
                    'postal_code' => $shippingAddress['postal_code'],
                    'country' => $shippingAddress['country'],
                ]);
            }
            $totalAmount = 0;

            foreach ($items as $item) {
                $product = Product::findOrFail($item['product_id']);
                $quantity = $item['quantity'];
                $storeId = $item['store_id'];

                // Step 2: Check if the product is available in the specified store
                $stockLevel = StockLevel::where('product_id', $product->id)
                    ->where('store_id', $storeId)
                    ->first();

                    if (!$stockLevel || $stockLevel->quantity < $quantity) {
                        throw new \Exception("Insufficient stock for Product ID {$product->id} in Store ID {$storeId}");
                    }

                // Step 3: Create the order item
                $price = $product->price;
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                    'price' => $price,
                    'store_id' => $storeId,
                ]);

                $totalAmount += $quantity * $price;
                // Update stock levels
                $stockLevel->decrement('quantity', $quantity);
                $stockLevel->last_updated = now();
                $stockLevel->save();
            }

            // Step 4: Update the order's total amount
            $order->update(['total_amount' => $totalAmount]);

            // Handle payment
            $paymentProcessor = new PaymentProcessor();
            $paymentResult = $paymentProcessor->process($paymentMethod, $order, $totalAmount);

            if ($paymentResult['status'] === 'completed') {
                $order->update(['status' => 'completed']);
            } elseif ($paymentResult['status'] === 'due') {
                $order->update(['status' => 'due']);
            }
            // Step 5: Create the sale record
            Sale::create([
                'order_id' => $order->id,
                'sale_date' => now(),
                'amount' => $totalAmount,
                'payment_method_id' => $paymentMethodId,
            ]);

            DB::commit();

            return $order;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
