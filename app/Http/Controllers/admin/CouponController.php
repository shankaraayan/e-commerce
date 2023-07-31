<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Coupon;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CouponController extends Controller
{
    public  function view(){
        $coupons = Coupon::get();
        return view('admin.coupons.view',compact('coupons'));
    }

    public function add(){
        return view('admin.coupons.add');
    }

    public  function store(Request $request){

        $validator = Validator::make($request->all(), [
            'price' => 'required|integer',
            'limit_use' => 'required',
            'min_order' => 'required',
            'appliable_on' => 'required',
            'applicable_country' => 'required',
            'specific_user' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('coupan_code_errore','Coupon')->withErrors($validator)->withInput();
        }

        $code = strtoupper(Str::random(6));
        while (Coupon::where('code', $code)->exists()) {
            $code = strtoupper(Str::random(6));
        }
        $coupon = Coupon::create(["code" => $code,] + $request->all());

        return redirect()->route('admin.coupon.edit', ['id' => $coupon->id]);

    }
    public function edit(Request $request,$id){
        $coupon = Coupon::find($id);
        // dd($coupon);
        return view('admin.coupons.edit',compact('coupon'));
    }
    public  function update(Request $request,$id){
        // dd($request->All());die;
        $coupon = Coupon::find($id);
        $coupon->update($request->All());
        return redirect()->back()->with('success','Coupon update successfully !');
    }
    public  function delete($id){
        $coupon = Coupon::find($id)->delete();
        return redirect()->back();
    }

    public  function apply_code(Request $request)
    {
        $coupon = Coupon::where('code',$request->code)->first();

        // return $request->country;
        if ($coupon) {

            if(today() >= $coupon->expiry_date){
                $response = ['message' => 'Coupon is already expired.','status' => 'faild',];
                    return json_encode($response);
            }

            $applicableCountry = $coupon->applicable_country;

            if(!in_array('all', $applicableCountry)){
                if(!in_array($request->country, $applicableCountry)){
                    $response = ['message' => 'This coupon code is not applicable in your country.','status' => 'faild',];
                    return json_encode($response);
                }
            }
            if($coupon->specific_user == 1){
                $userList = explode(',', $coupon->user_id);
                if(auth()->user()){

                    if(!in_array(auth()->user()->email,$userList)){
                        $response = ['message' => 'This coupon code is only for limited user.','status' => 'faild',];
                    return json_encode($response);
                    }
                }else{
                    $response = ['message' => 'This coupon code is only for limited user. please login','status' => 'faild',];
                    return json_encode($response);
                }
            }

            $cart = session()->get('cart', []);
            // return $cart;
            $cartValue = 0;
            foreach (session('cart') as $id => $details){
                $cartValue += ($details['price']*$details['quantity']);
            }
            if($cartValue < $coupon->min_order){

                $response = ['message' => 'Cart value is not enough for this code. Please add more product.','status' => 'faild',];
                return json_encode($response);
            }

            $subtotal = 0;
            $coupon_data = [];

            foreach ($cart as &$item) {
                $tax = getTaxCountry((int)$request->country);

                $subtotal+= ($item['price']*$item['quantity'] + ($item['price'] * $tax['vat_tax'] /100 * $item['quantity']));
                if (isset($item['product_id'])) {
                    $coupon_data =  $item['discount'] = [
                        'code' => $coupon->code,
                        'type' => $coupon->appliable_on,
                        'discount_value' => $coupon->price,
                    ];
                }

            }


            $shipping_price = shippingCountry()->where('country',$request->country)->pluck('price')->first();

            if( $coupon_data['type']=="flat")
            {
                $afterDiscount =  ($subtotal- $coupon_data['discount_value']);
                $total = ($subtotal-$afterDiscount)+$shipping_price;
            }
            else{
                // print_r(formatPrice($subtotal));die;
                $afterDiscount = $subtotal * $coupon_data['discount_value']/100;
                $total = ($subtotal-$afterDiscount)+$shipping_price;
            }

            $data = [
                "shipping_price" => formatPrice($shipping_price),
                "total" => formatPrice($total),
                "discount_value" => $coupon_data['discount_value']!=="flat" ? $coupon_data['discount_value'].'%':$coupon_data['discount_value'].'',
                "code"=>$coupon_data['code']
            ];
            // print_r($data);die;
            $response = ['message' => 'Coupon Applied!','status' => 'success',"data"=>$data];
            $cart = session()->put('cart', $cart);
            return json_encode($response);
        } else {
            $response = ['message' => 'Coupon Not Found!','status' => 'faild',];
            return json_encode($response);
        }
    }

    public function code_remove()
    {
        $cart = session()->get('cart', []);

        foreach ($cart as &$item) {
            if (isset($item['product_id'])) {
                $item['discount'] = [
                    'code' => null,
                    'type' => null,
                    'discount_value' => null,
                ];
            }
        }

         session()->put('cart', $cart);
         $cart = session()->get('cart', []);

         $shippingCountry = end($cart);

        // dd(session('cart'));
            $total = 0;
            foreach($cart as $item){
                $tax = getTaxCountry((int)$shippingCountry['shipping_country']);
                $total+= ($item['price']*$item['quantity'] + ($item['price'] * $tax['vat_tax'] /100 * $item['quantity']));

            }
            $shipping_price = shippingCountry()->where('country',$shippingCountry['shipping_country'])->pluck('price')->first();

            $total = ($total+ $shipping_price);

            $data = [
                'shipping_price' => formatPrice($shipping_price),
                'total' =>formatPrice($total)
            ];
            $response = ['message' => 'Coupon removed!','status' => 'success',"data"=>$data];
            return json_encode($response);
        // return redirect()->back();
    }

    public function randomStr(){
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pin = mt_rand(111, 999). $characters[rand(0, strlen($characters) - 1)];

            $string = str_shuffle($pin);

            return $string;

    }
}
