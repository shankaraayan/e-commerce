<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\countryModel;
use App\Models\Shipping;
use App\Models\Product;
use Illuminate\Http\Request;

class ShippingController extends Controller
{
    public function index(){

        $shipping = Shipping::get();
        return view('admin.shipping.list',compact('shipping'));
    }

    public function add(){
        return view('admin.shipping.add');
    }

    public function store(Request $request){
        $saveShipping = new Shipping();
        $saveShipping->name = $request->name;
        $saveShipping->status = $request->status;
        $saveShipping->save();

        // return redirect()-back()->with('sucess','Shipping Add Sucessfully');
        return redirect()->back()->with('success', 'Shipping Added Successfully');
    }
    public function update(Request $request){

        $saveShipping = Shipping::find($request->shipping_id);
        $saveShipping->name = $request->name;
        if($request->status == 1){
            $saveShipping->status = 1;
        }else{
            $saveShipping->status = 0;
        }

        $saveShipping->save();

        // return redirect()-back()->with('sucess','Shipping Add Sucessfully');
        return redirect()->back()->with('success', 'Shipping Updated Successfully');
    }

    public function delete($id){
        if(Product::where('shipping_class',$id)->exists()) return redirect()->back()->with('error', 'The shipping class is being used in some of the products. Please remove it from those products first.');
        Shipping::find($id)->delete();

        return redirect()->back()->with('success', 'Shipping Deleted Successfully');
    }

    public function countryIndex($idShipping = null){
        $id = $idShipping;
        $countryShipping = countryModel::where('shipping_id',$id)->get();
        return view('admin.shipping.countryShipping.list',compact('countryShipping','id'));
    }

    public function countryAdd($id){
        $shippingId = $id;
        return view('admin.shipping.countryShipping.add',compact('shippingId'));
    }

    public function countryStore(Request $request){
        $saveShipping = new countryModel();
        $saveShipping->name = $request->name;
        $saveShipping->country = $request->country;
        $saveShipping->price = $request->price;
        $saveShipping->shipping_id = $request->shipping_id;
        $saveShipping->status = $request->status;
        $saveShipping->save();

        // return redirect()-back()->with('sucess','Shipping Add Sucessfully');
        return redirect()->back()->with('success', 'Shipping Added Successfully');
    }

    public function countryUpdate(Request $request){
        // dd($request->name);
        $saveShippingCountry = countryModel::find($request->shipping_id);
        $saveShippingCountry->name = $request->name;
        $saveShippingCountry->status = $request->status;
        $saveShippingCountry->country = $request->country;
        $saveShippingCountry->price = $request->price;
        $saveShippingCountry->shipping_id = $saveShippingCountry->shipping_id;

        $saveShippingCountry->save();

        // return redirect()-back()->with('sucess','Shipping Add Sucessfully');
        return redirect()->back()->with('success', 'Shipping Updated Successfully');
    }

    public function countryDelete($id){
        countryModel::find($id)->delete();
        return redirect()->back()->with('success', 'Shipping Deleted Successfully');
    }

    public function shippingPrice(Request $request){
        $shippingCountry = $request->shipping_country;
        // $shippingCountry = country()->where('id',$request->shipping_country)->pluck('id')->first();
        if ($shippingCountry) {
            $cart = session()->get('cart', []);

            foreach($cart as $item){

                $discount = @$item['discount'];
            }

            $shipping_price = shippingCountry()->where('country',$shippingCountry)->pluck('price')->first();

            $subtotal = 0;
            $cart_items = [];
            if($discount){
                $discount_value = $discount['discount_value'];
                $type = $discount['type'];
                $code = $discount['code'];
                foreach($cart as $item){

                    $cart[$item['product_id']]['shipping_country'] = $shippingCountry;
                    $tax = getTaxCountry((int)$shippingCountry);
                    if(empty($tax)){
                        $tax['vat_tax'] = 0;
                    }

                    if($item['solar_product']=="yes"){
                        if($tax['short_code'] == 'DE'){
                            $tax['vat_tax'] = 0;
                        }
                    }
                    
                    if (isset($item['product_id'])) {
                        // print_r($item['discount']);die;
                        $item['discount'] = [
                            'code' => $code,
                            'type' => $type,
                            'discount_value' => $discount_value,
                        ];
                    }
                   
                    $item['price_with_tax'] = formatPrice( ($item['price']*$item['quantity'] + $item['price'] * $tax['vat_tax'] /100 * $item['quantity']));
                    array_push($cart_items,$item);
                    $subtotal+= ($item['price']*$item['quantity'] + ($item['price'] * $tax['vat_tax'] /100 * $item['quantity']));
                }

                if( $type=="flat")
                {

                    $afterDiscount =  ($subtotal - $discount_value);

                    $total = ($subtotal-$afterDiscount)+$shipping_price;

                }
                else{
                    // print_r(formatPrice($subtotal));die;
                    $afterDiscount = $subtotal *  $discount_value/100;
                    $total = ($subtotal-$afterDiscount)+$shipping_price;
                }

            }
            else{
                $total = 0;
                foreach($cart as $item){
                    $cart[$item['product_id']]['shipping_country'] = $shippingCountry;
                    $tax = getTaxCountry((int)$shippingCountry);
                    if(empty($tax)){
                        $tax['vat_tax'] = 0;
                    }

                    if($item['solar_product']=="yes"){
                        if($tax['short_code'] == 'DE'){
                            $tax['vat_tax'] = 0;
                        }
                    }
                    $subtotal += ($item['price']*$item['quantity'] + ($item['price'] * $tax['vat_tax'] /100 * $item['quantity']));
                    $total = ($subtotal+$shipping_price);

                    $item['price_with_tax'] =  formatPrice(($item['price']*$item['quantity'] + $item['price'] * $tax['vat_tax'] /100 * $item['quantity']));
                    array_push($cart_items,$item);

                }

            }

            // print_r($total);die;
            session()->put('cart',$cart);
            // if($cart['discount'])

            return response()->json([
                'cart'=>$cart_items,
                'subtotal' => formatPrice($subtotal),
                'total' =>formatPrice($total),
                'coupon'=>@$discount['code'] ? true : false,
                'type'=> @$type? $type :null,
                'shipping_price' => formatPrice($shipping_price),
                'discount_value'=> @$discount_value ? $discount_value : null
            ]);
        }
        else {
            return false;
        }
    }

}
