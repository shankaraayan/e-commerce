<?php

namespace App\Services;
use App\Models\admin\Product;
use App\Models\admin\AttributeTerm;

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

}