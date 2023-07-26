<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $casts = [
        'cart_array' => 'array',
    ];

    protected $fillable = [
        'user_id',
        'cart_array',
        'cart_id',
    ];
}
