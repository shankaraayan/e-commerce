<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory,SoftDeletes;

    protected $casts = [
        'applicable_country' => 'array',
        'user_id' => 'array',
        'exclude_category' => 'array',
        'exclude_product' => 'array',
        'expiry_date' => 'date'
    ];

    protected $fillable = [
        'code',
        'appliable_on',
        'price',
        'applicable_country',
        'user_limit_use',
        'specific_user',
        'user_id',
        'limit_use',
        'expiry_date',
        'min_order',
        'exclude_category',
        'exclude_product',
        'status',
        'deleted_at',
        'used',
    ];
}
