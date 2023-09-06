<?php

namespace App\Services\PaymentGatway;

use Mollie\Laravel\Facades\Mollie;

class MolliesPayService
{
    public function  __construct() {
        $auth =  paymentDetail('Mollie')->toarray();
        Mollie::api()->setApiKey($auth['API_KEY']);
    }

    public function CreatePayment($order,$order_data,$details)
    {   
        $final_payment = base64_decode($order_data['final_payment']);
        $final_payment = str_replace('€','',$final_payment);
        $final_payment = str_replace('.', '', $final_payment);
        $final_payment = str_replace(',', '.', $final_payment);
        $final_payment = str_replace(',', '.', $final_payment);

        $payment = Mollie::api()->payments()->create([
        'amount' => [
            'currency' => 'EUR', 
            'value' => $final_payment,
        ],
        'description' => 'Payment For Epp Solar', 
        'redirectUrl' => route('mollie.payment.success'),
        'cancelUrl' => route('mollie.payment.cencel'),
        ]);

        session([
            'mollie_payment_data' => [
                'order' => $order,
                'order_data' => $order_data,
                'details' => $details,
                'payment_id' => $payment->id,
            ],
        ]);
    
        $payment = Mollie::api()->payments()->get($payment->id);
        return redirect($payment->getCheckoutUrl(), 303);
        // $redirectUrl = route('mollie.payment.success', ['id' => $payment->id]);
        // return redirect($redirectUrl, 303);

    }


}