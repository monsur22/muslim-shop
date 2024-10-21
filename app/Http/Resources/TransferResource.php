<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TransferResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'product_id' => $this->product_id,
            'source_store_id' => $this->source_store_id,
            'destination_store_id' => $this->destination_store_id,
            'quantity' => $this->quantity,
            'transfer_date' => $this->transfer_date,
        ];
    }
}
