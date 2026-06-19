<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'category_id',
        'title',
        'small_description',
        'description',
        'price',
        'status',
        'image',
        'slug',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'product_code'
    ];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function images(){
        return $this->hasMany(Images::class, 'product_id', 'id');
    }
}
