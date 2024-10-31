<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StockLevel extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'product_id','quantity', 'last_updated'
    ];


    public function storeProduct()
    {
        return $this->belongsTo(StoreProduct::class);
    }

}
