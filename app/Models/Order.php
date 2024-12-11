<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Order extends Model
{
    const STATUS_PENDING = 'Chưa xác nhận';
    const STATUS_CONFIRMED = 'Đã xác nhận';
    const STATUS_SHIPPED = 'Đang giao';
    const STATUS_COMPLETED = 'Hoàn thành';
    const STATUS_CANCELLED = 'Hủy bỏ';

    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'code',
        'address',
        'token',
        'customer_id',
        'status',
        'quantity'
    ];

    public function customer()
    {
        return $this->hasOne(Customer::class, 'id', 'customer_id');
    }

    public function details()
    {
        return $this->hasMany(OrderItem::class, 'order_id', 'id');
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    protected static function booted()
    {
        static::creating(function ($order) {
            // Tạo mã đơn hàng với tiền tố "ORD-" và chuỗi ngẫu nhiên
            $order->code = 'ORD-' . strtoupper(Str::random(8));
        });
    }

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }

    
    public function vouchers()
    {
        return $this->belongsToMany(Voucher::class, 'voucher_product');
    }

   
}
