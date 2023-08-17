<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentGatway extends Model
{
    use HasFactory;

    protected $fillable = [
        'mode',
        'app_name',
        'app_id',
        'PAYPAL_CURRENCY',
        'API_USERNAME',
        'API_PASSWORD',
        'API_SECRET',
        'API_KEY',
        'PAYPAL_API_CERTIFICATE',
        'PAYPAL_SUCCESS_URL',
        'PAYPAL_FAILED_URL',
        'status',
        'logo',
    ];
    protected $casts = [];
}
