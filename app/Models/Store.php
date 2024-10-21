<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Store extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name',
    ];

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    // public function products()
    // {
    //     return $this->hasMany(Product::class);
    // }
    
    public function stockLevels()
    {
        return $this->hasMany(StockLevel::class);
    }

}
