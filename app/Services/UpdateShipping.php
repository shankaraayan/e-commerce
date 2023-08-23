<?php
namespace App\Services;
use Exception;
use Illuminate\Support\Facades\Http;

class UpdateShipping
{
    public function update($request)
    {
        $cart = session()->get("cart", []);
        
        if ($request->shipping_country) {
             $shippingCountry = $request->shipping_country;
        } 
        else 
        {
            foreach ($cart as $item) {
                $shippingCountry = @$item["shipping_country"];
            }
        }
        
            foreach ($cart as $item) {
                $discount = @$item["discount"];
            }

            $shipping_price = shippingCountry()
                ->where("country", $shippingCountry)
                ->pluck("price")
                ->first();

            $subtotal = 0;
            $cart_items = [];
            
            if ($discount) {
                $discount_value = $discount["discount_value"];
                $type = $discount["type"];
                $code = $discount["code"];
                
                foreach ($cart as $item) {
                    $cart[$item["product_id"]][
                        "shipping_country"
                    ] = $shippingCountry;
                    
                    $tax = getTaxCountry((int) $shippingCountry);
                    if (empty($tax)) {
                        $tax["vat_tax"] = 0;
                    }

                    if ($item["solar_product"] == "yes") {
                        if ($tax["short_code"] == "DE") {
                            $tax["vat_tax"] = 0;
                        }
                    }

                    if (isset($item["product_id"])) {
                        // print_r($item['discount']);die;
                        $item["discount"] = [
                            "code" => $code,
                            "type" => $type,
                            "discount_value" => $discount_value,
                        ];
                    }

                    $item["price_with_tax"] = formatPrice(
                        $item["price"] * $item["quantity"] +
                            (($item["price"] * $tax["vat_tax"]) / 100) *
                                $item["quantity"]
                    );
                    array_push($cart_items, $item);
                    $subtotal +=
                        $item["price"] * $item["quantity"] +
                        (($item["price"] * $tax["vat_tax"]) / 100) *
                            $item["quantity"];
                }

                if ($type == "flat") 
                {
                    $afterDiscount = $subtotal - $discount_value;

                    $total = $afterDiscount + $shipping_price;
                } 
                else 
                {
                    // print_r(formatPrice($subtotal));die;
                    $afterDiscount = ($subtotal * $discount_value) / 100;
                    
                    
                    if($cart[$item["product_id"]]["bank_transfer"]=="yes"){
                         
                        $bank_dis = ($subtotal - $afterDiscount + $shipping_price)*3/100;
                        
                        $total =  ($subtotal - $afterDiscount + $shipping_price)-$bank_dis;
                        
                     }else{
                         $total = $subtotal - $afterDiscount + $shipping_price;
                     }     
                }
                
            } else {
                $total = 0;
                foreach ($cart as $item) {
                    $cart[$item["product_id"]][
                        "shipping_country"
                    ] = $shippingCountry;
                    $tax = getTaxCountry((int) $shippingCountry);
                    if (empty($tax)) {
                        $tax["vat_tax"] = 0;
                    }

                    if ($item["solar_product"] == "yes") {
                        if ($tax["short_code"] == "DE") {
                            $tax["vat_tax"] = 0;
                        }
                    }
                    $subtotal +=
                        $item["price"] * $item["quantity"] +
                        (($item["price"] * $tax["vat_tax"]) / 100) *
                            $item["quantity"];
                     
                     if($cart[$item["product_id"]]["bank_transfer"]=="yes"){
                         
                        $bank_dis = ($subtotal + $shipping_price)*3/100;
                        $total =  ($subtotal + $shipping_price)-$bank_dis;
                        
                     }else{
                          $total = $subtotal + $shipping_price;
                     }       
                   

                    $item["price_with_tax"] = formatPrice(
                        $item["price"] * $item["quantity"] +
                            (($item["price"] * $tax["vat_tax"]) / 100) *
                                $item["quantity"]
                    );
                    
                    array_push($cart_items, $item);
                }
            }

            session()->put("cart", $cart);
           
            return [
                "cart" => $cart_items,
                "subtotal" => formatPrice($subtotal),
                "total_unformate"=>$total,
                "total" => formatPrice($total),
                "coupon" => @$discount["code"] ? true : false,
                "type" => @$type ? $type : null,
                "bank_dis" => @$bank_dis ? formatPrice($bank_dis) : '',
                "shipping_price" => formatPrice($shipping_price),
                "discount_value" => @$discount_value ? $discount_value : null,
            ];
    }
}

?>
