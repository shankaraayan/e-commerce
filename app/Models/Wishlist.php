<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;


    protected $casts = [
        "product_id" => "array",
    ];

    protected $fillable = [
        'product_id',
        'user_id'
    ];
}
