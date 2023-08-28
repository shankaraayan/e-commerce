<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkuCombination extends Model
{
    use HasFactory;

    protected $casts = [
        'combination_ids' => 'array',
    ];

    protected $fillable = [
        'product_id',   
        'sku',   
        'combination_ids',  
        'url',  
    ];
}
