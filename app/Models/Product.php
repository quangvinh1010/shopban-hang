<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment; // Thêm namespace đúng

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['img', 'name', 'desc', 'price', 'sale_price', 'category_id', 'status'];

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }

    public function vouchers()
    {
        return $this->belongsToMany(Voucher::class, 'voucher_product');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
