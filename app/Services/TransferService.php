<?php

namespace App\Services;

use App\Http\Resources\TransferResource;
use App\Models\StockLevel;
use App\Models\Transfer;
use App\Services\Interfaces\TransferServiceInterface;
use Illuminate\Support\Facades\DB;

class TransferService implements TransferServiceInterface   
{
    public function transferProduct($data)
    {
        DB::beginTransaction();

        try {
            // Get the source store's stock level
            $sourceStock = StockLevel::where('product_id', $data['product_id'])
                ->where('store_id', $data['source_store_id'])
                ->orderBy('id', 'desc')
                ->first();

            if (!$sourceStock || $sourceStock->quantity < $data['quantity']) {
                return response()->json(['error' => 'Not enough stock in source store'], 400);
            }

            // Deduct quantity from source store
            $sourceStock->quantity -= $data['quantity'];
            $sourceStock->last_updated = now();
            $sourceStock->save();

            // Add quantity to destination store
            $destinationStock = StockLevel::firstOrNew([
                'product_id' => $data['product_id'],
                'store_id' => $data['destination_store_id'],
            ]);
            $destinationStock->quantity += $data['quantity'];
            $destinationStock->last_updated = now();
            $destinationStock->save();

            // Record the transfer
            $transfer=Transfer::create([
                'product_id' => $data['product_id'],
                'source_store_id' => $data['source_store_id'],
                'destination_store_id' => $data['destination_store_id'],
                'quantity' => $data['quantity'],
                'transfer_date' => now(),
            ]);

            DB::commit();

            return new TransferResource($transfer);

            // return $this->successResponse();
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->errorResponse($e->getMessage());
        }
    }

    public function successResponse()
    {
        return response()->json(['message' => 'Transfer successful'], 200);
    }

    public function errorResponse($message)
    {
        return response()->json(['error' => 'Transfer failed: ' . $message], 500);
    }
}
