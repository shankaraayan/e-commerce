<?php

namespace App\Services\PaymentGatway;

use Mollie\Laravel\Facades\Mollie;

class MolliesPayService
{
    public function  __construct() {
        Mollie::api()->setApiKey('test_7wqahzQJ4f5mwhWKKbvaxymp3eqETR');
    }

    public function CreatePayment()
    {   
        $payment = Mollie::api()->payments()->create([
        'amount' => [
            'currency' => 'EUR', 
            'value' => '10.00',
        ],
        'description' => 'Payment By TestCoderDeviL', 
        'redirectUrl' => route('mollie.payment.success'),
        'cancelUrl' => route('mollie.payment.cencel'),
        ]);
    
        // dd($payment);
        $payment = Mollie::api()->payments()->get($payment->id);
        return redirect($payment->getCheckoutUrl(), 303);
    }


}