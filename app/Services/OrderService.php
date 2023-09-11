<?php

namespace App\Services;
use Exception;
use Illuminate\Support\Facades\Http;

class OrderService {
    
    protected $url,$staticPath;
    
    public function __construct()
    {
        $this->url = env('APP_API_URL');
    }
    
    //* Sent From Frontend Controller
    public function sendOrderStegback(int $order_no, array $orderData,$payment=null)
    {
        try {
            $request =  Http::contentType('application/json')
                ->post($this->url."/api/eppsolar/24/save-order", [
                    'order_no' => $order_no,
                    'order_data' => $orderData,
                    'payment' => $payment,
                ]);

            return($request->body());die;
            if (!$request->successful()) throw new Exception();
            $response = $request->json();
            return $response;

        } catch (\Exception $e) {
            return (['error'=> $e]);
        }
    }
}