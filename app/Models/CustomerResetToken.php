<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerResetToken extends Model
{
    use HasFactory;

    protected $table = 'customer_reset_tokens';
    protected $primaryKey = 'email';
    public $incrementing = false;
    protected $keyType = 'string'; 

    protected $fillable = ['email', 'token', 'created_at', 'updated_at'];

    public function customer() {
        return $this->hasOne(Customer::class , 'email', 'email');
    }

    public function scopeCheckToken($q, $token) {
        return $q->where('token', $token)->firstOrFail();
    }
}
