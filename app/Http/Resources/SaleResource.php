<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SaleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'sale_id' => $this->id,
            'order_id' => new OrderResource($this->whenLoaded('order')),
            'sale_date' => $this->sale_date,
            'amount' => $this->amount,
            'payment_method_id' => $this->payment_method_id, 
            'created_at' => $this->created_at,
            'deleted_at' => $this->deleted_at,
        ];
    }
}
