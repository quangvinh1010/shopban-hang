<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['product_id', 'customer_id', 'comment'];
    
    // Mối quan hệ với bảng khách hàng
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    // Mối quan hệ với bảng sản phẩm
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
