<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name', 'category_id', 'supplier_id', 'brand_id', 'user_id', 'price', 'expire_date', 'status'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function supplier()
    {
        return $this->belongsTo(User::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    // public function store()
    // {
    //     return $this->belongsTo(Store::class);
    // }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function description()
    {
        return $this->hasOne(ProductDescription::class);
    }

    public function inventory()
    {
        return $this->hasOne(ProductInventory::class);
    }

    public function stockLevels()
    {
        return $this->hasMany(StockLevel::class);
    }

    public function stores()
    {
        return $this->hasManyThrough(Store::class, StockLevel::class, 'product_id', 'id', 'id', 'store_id');
    }
    
    public function transfers()
    {
        return $this->hasMany(Transfer::class);
    }
     // Query Scopes
     public function scopeFilter($query, $filters)
     {
         return $query->where(function($query) use ($filters) {
             foreach ($filters as $field => $value) {
                 if (!is_null($value)) {
                     $query->where($field, $value);
                 }
             }
         });
     }
 
     public function scopeSearch($query, $searchTerm)
     {
         if ($searchTerm) {
             return $query->where(function($q) use ($searchTerm) {
                 $q->where('name', 'like', "%{$searchTerm}%")
                   ->orWhereHas('category', function($q) use ($searchTerm) {
                       $q->where('name', 'like', "%{$searchTerm}%");
                   })
                   ->orWhereHas('supplier', function($q) use ($searchTerm) {
                       $q->where('name', 'like', "%{$searchTerm}%");
                   })
                   ->orWhereHas('brand', function($q) use ($searchTerm) {
                       $q->where('name', 'like', "%{$searchTerm}%");
                   });
                //    ->orWhereHas('store', function($q) use ($searchTerm) {
                //        $q->where('name', 'like', "%{$searchTerm}%");
                //    });
             });
         }
     }
}
