<?php

namespace App\Services;
class OrderService {
    
    public function sendOrderStegback(int $order_no, array $orderData, string $url)
    {
        try {
            $request =  Http::contentType('application/json')
                ->post($url.'api/orderFromStegpearl', [
                    'order_no' => $order_no,
                    'order_data' => $orderData
                ]);

            if (!$request->successful()) throw new Exception();

            $response = $request->json();
            return $response;

        } catch (\Exception $e) {
            return false;
        }
    }
}