<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Customer extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', 'email',  'phone', 'address', 'gender', 'password', 'confirm_password', 'email_verified_at',
    ];
    

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',       // To ensure the password is not serialized
        'remember_token', // To hide the remember token
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime', // Ensure correct casting for datetime fields
    ];

    /**
     * Define the relationship between Customer and Order.
     */
    public function orders() // Make method name plural for clarity
    {
        return $this->hasMany(Order::class);
    }

    // Optionally, you can add any other necessary relationships or methods for the Customer model.
}
