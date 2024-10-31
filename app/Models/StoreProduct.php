<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StoreProduct extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'store_id',
        'product_id',
        'quantity',
        'visible',
    ];
    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function stockLevels()
    {
        return $this->hasMany(StockLevel::class, 'product_id', 'id');
    }
}
