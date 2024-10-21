<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $includes = $request->query('include') ? explode(',', $request->query('include')) : [];

        return [
            'id' => $this->id,
            'name' => $this->name,
            // 'category_id' => new CategoryResource($this->whenLoaded('category')),
            // 'supplier_id' => new UserResource($this->whenLoaded('supplier')),
            // 'brand_id' => new BrandResource($this->whenLoaded('brand')),
            // 'store_id' => new StoreResource($this->whenLoaded('store')),
            // 'images' => new ImageResource($this->whenLoaded('images')),

            'category' => in_array('category', $includes) || !$includes ? new CategoryResource($this->whenLoaded('category')) : null,
            'supplier' => in_array('supplier', $includes) || !$includes ? new UserResource($this->whenLoaded('supplier')) : null,
            'brand' => in_array('brand', $includes) || !$includes ? new BrandResource($this->whenLoaded('brand')) : null,
            // 'store' => in_array('store', $includes) || !$includes ? new StoreResource($this->whenLoaded('store')) : null,
            'user' => in_array('user', $includes) || !$includes ? new UserResource($this->whenLoaded('user')) : null,
            'images' => in_array('images', $includes) || !$includes ? ImageResource::collection($this->whenLoaded('images')) : [],
            'description' => in_array('description', $includes) || !$includes ? new ProductDescriptionResource($this->whenLoaded('description')) : [],
            'price' => $this->price,
            'inventory' => in_array('inventory', $includes) || !$includes ? new ProductInventoryResource($this->whenLoaded('inventory')) : [],
            'stockLevels' => in_array('stockLevels', $includes) || !$includes ?  StockLevelResource::collection($this->whenLoaded('stockLevels')) : [],
            'stores' => in_array('stores', $includes) || !$includes ?  StoreResource::collection($this->whenLoaded('stores')) : [],
            'expire_date' => $this->expire_date,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
