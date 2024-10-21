<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'product_id' => $this->product_id,
            'product_name' => $this->product ? $this->product->name : null,
            'quantity' => $this->quantity,
            'price' => $this->price,
            'store_id' => $this->store_id,
            'store_name' => $this->store ? $this->store->name : null,
            'total' => $this->quantity * $this->price,
        ];
    }
}
