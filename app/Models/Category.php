<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name',
        'parent_id',

    ];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
    public function product(){

        return $this->hasOne(Category::class);
    }
}
