<?php

namespace App\Services\PaymentGatway;

use App\Http\Controllers\FrontendController;
use App\Models\Order;
use App\Models\PaypalTransaction;
use Srmklive\PayPal\Services\PayPal;

class PaypalService
{
    protected $mode, $secret;

    protected $api;
    
    public function __construct()
    {
        $this->mode =  config('papypal.mode.');
    }

    public function payment($order,$order_data,$details)
    {
        $final_payment = base64_decode($order_data['final_payment']);
        $final_payment = str_replace('€','',$final_payment);
        $final_payment = str_replace('.', '', $final_payment);
        $final_payment = str_replace(',', '.', $final_payment);
        $final_payment = str_replace(',', '.', $final_payment);
        
        $provider = new PayPal;
        $provider->setApiCredentials($this->auth());
        $paypalToken = $provider->getAccessToken();

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('payment.success'),
                "cancel_url" => route('payment.cancel'),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => "EUR",
                        "value" => $final_payment,
                    ],
                ]
            ]
        ]);

        session([
            'paypal_payment_data' => [
                'order' => $order,
                'order_data' => $order_data,
                'details' => $details,
            ],
        ]);

        if (isset($response['id']) && $response['id'] != null) {
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }
        } else {
            return redirect()
                ->route('testView')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }

       
    }

    public function paymentSuccess($request)
    {
        $provider = new PayPal;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);

        $paymentData = session('paypal_payment_data');
        
        $paypal = new PaypalTransaction;
        $paypal->transaction_id = $response['id'];
        $paypal->status = $response['status'];
        $paypal->payment_source = $response['payment_source'];
        $paypal->purchase_units = $response['purchase_units'];
        $paypal->payer = $response['payer'];
        $paypal->order_id = $paymentData['order']['order_id'];
        $paypal->save();

        (new FrontendController)->OrderProccess($paymentData['order'],$paymentData['order_data'],$paymentData['details']);

        Order::where('order_id',$paymentData['order_data']['order_id'])->update([
            'payment_id' => $response['id'],
            'payment_status' => $response['status'],
            'transaction_id' => null,
            'status' => "in-proccess"
        ]);

        $orderUrl = route('order_confirmation', ['id' => $paymentData['order']['order_id'] ]);
        return redirect($orderUrl)->with('success', 'Thanks for the Order');

    }

    public function auth()
    {
        $auth =  paymentDetail('PayPal')->toarray();
        // dd($auth);
        return [
            'mode'    => ($auth['mode'] ? "live" : "sandbox") ?? "sandbox", // Can only be 'sandbox' Or 'live'. If empty or invalid, 'live' will be used.
            'sandbox' => [
                'client_id'         => $auth['API_KEY'] ?? env('PAYPAL_SANDBOX_CLIENT_ID', ''),
                'client_secret'     => $auth['API_SECRET'] ?? env('PAYPAL_SANDBOX_CLIENT_SECRET', ''),
                'app_id'            => $auth['app_id'] ?? 'APP-80W284485P519543T',
            ],
            'live' => [
                'client_id'         => $auth['API_KEY'],
                'client_secret'     => $auth['API_SECRET'],
                'app_id'            => $auth['app_id'],
            ],

            'payment_action' => env('PAYPAL_PAYMENT_ACTION', 'Sale'), // Can only be 'Sale', 'Authorization' or 'Order'
            'currency'       => $auth['PAYPAL_CURRENCY'] ?? 'EUR',
            'notify_url'     => env('PAYPAL_NOTIFY_URL', ''), // Change this accordingly for your application.
            'locale'         => env('PAYPAL_LOCALE', 'en_US'), // force gateway language  i.e. it_IT, es_ES, en_US ... (for express checkout only)
            'validate_ssl'   => env('PAYPAL_VALIDATE_SSL', true), // Validate SSL when creating api client.
        ];

    }

}

