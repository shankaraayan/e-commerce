<?php

namespace App\Services;
use App\Models\admin\Product;
use App\Models\admin\AttributeTerm;
use App\Models\Order;

class UpdateQuantity {

    public function reduceQuantity($sku, $qty)
    {   
        $product = Product::where('sku', $sku)->first();
        if ($product) {
            $product->quantity = $product->quantity - $qty;
            $product->save();
        } else {
            $attributeTerm = AttributeTerm::where('sku', $sku)->first(); 
            if ($attributeTerm) {
                $attributeTerm->quantity = $attributeTerm->quantity - $qty;
                $attributeTerm->save();
            }
        }
        return true; 
    }

    public function updateOrderStatus($orderId,$orderStatus)
    {
        Order::where('order_id',$orderId)->update([
            "status" => $orderStatus,
        ]);
        return true;
    }

}