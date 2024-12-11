<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'discount_amount',
        'discount_percent',
        'valid_from',
        'valid_to',
        'usage_limit',
        'used_count',
    ];
    

    public function isValid()
    {
        $currentDate = Carbon::now();
        return $this->valid_to >= $currentDate && ($this->usage_limit === null || $this->usage_limit > 0);
    }
    

    public function products()
    {
        return $this->belongsToMany(Product::class, 'voucher_product');
    }
}
