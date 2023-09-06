<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MollieTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_id',
        'status',
        'payment_source',
        'purchase_units',
        'payer', 
        'order_id',
    ];

    protected $casts = [
        'payment_source' => 'array',
        'purchase_units' => 'array',
    ];
}
