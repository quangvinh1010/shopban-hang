<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = ['customer_id', 'product_id', 'price', 'quantity'];
    

    public function prod(){
        return $this->hasOne(Product::class, 'id', 'product_id');
    }

    private function getTotalQuantity(){
        $total = 0;
        foreach($this->items as $item){
            $total =+ $item->quantity;
        }
        return $total;
    }
}
