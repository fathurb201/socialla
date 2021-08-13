<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand_id', 'title', 'name', 'description', 'iSPreOrder', 'iSPreOrder', 'price', 'hasVoucher', 'rating', 'totalRating', 'variant', 'stock'
    ];

    public function ProductGallery()
    {
        return $this->hasMany('App\Models\ProductGallery');
    }
}
