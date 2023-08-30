<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Coupon;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Services\UpdateShipping;

class CouponController extends Controller
{
    public  function view(){
        $coupons = Coupon::paginate(10);
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
                return response()->json($response);
            }

            $applicableCountry = $coupon->applicable_country;

            if(!in_array('all', $applicableCountry)){
                if(!in_array($request->country, $applicableCountry)){
                    $response = ['message' => 'This coupon code is not applicable in your country.','status' => 'faild',];
                    return response()->json($response);
                }
            }
            if($coupon->specific_user == 1){
                $userList = explode(',', $coupon->user_id);
                if(auth()->user()){

                    if(!in_array(auth()->user()->email,$userList)){
                        $response = ['message' => 'This coupon code is only for limited user.','status' => 'faild',];
                        return response()->json($response);
                    }
                }else{
                    $response = ['message' => 'This coupon code is only for limited user. please login','status' => 'faild',];
                    return response()->json($response);
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
                return response()->json($response);
            }
            
            foreach ($cart as &$item) {
                if (isset($item['product_id'])) {
                    $coupon_data =  $item['discount'] = [
                        'code' => $coupon->code,
                        'type' => $coupon->appliable_on,
                        'discount_value' => $coupon->price,
                    ];
                
                }
            }
            session()->put('cart', $cart);
            $shipping = new UpdateShipping ;
            $response = $shipping->update($request);
            
            $response['message'] = 'Coupon Applied!';
            $response['status'] = 'success';
            return response()->json($response);
        
        } else {
            $response = ['message' => 'Coupon Not Found!','status' => 'faild'];
            return  response()->json($response);
        }
    }

    public function code_remove(Request $request)
    {
        $cart = session()->get('cart', []);
    
        foreach ($cart as $index => $item) {
            if (isset($item['product_id'])) {
                $cart[$index]['discount'] = [
                    'code' => null,
                    'type' => null,
                    'discount_value' => null,
                ];
            }
        }
    
        session()->put('cart', $cart);
    
        // $shippingCountry = end($cart);
    
        // $cart_items = [];
        // $subtotal = 0;
        // foreach ($cart as $index => $item) {

        //     $tax = getTaxCountry((int) $shippingCountry['shipping_country']);
        //     if (empty($tax)) {
        //         $tax['vat_tax'] = 0;
        //     }
    
        //     if ($item['solar_product'] == "yes") {
        //         if ($tax['short_code'] == 'DE') {
        //             $tax['vat_tax'] = 0;
        //         }
        //     }
        //     $item['price_with_tax'] = formatPrice( ($item['price']*$item['quantity'] + ($item['price'] * $tax['vat_tax'] /100 * $item['quantity'])));
        //     $subtotal += ($item['price'] * $item['quantity'] + ($item['price'] * $tax['vat_tax'] / 100 * $item['quantity']));
        //     $cart[$index]['price_with_tax'] = formatPrice(($item['price'] * $item['quantity'] + $item['price'] * $tax['vat_tax'] / 100 * $item['quantity']));
        //     array_push($cart_items,$item);
        // }
    
        // $shipping_price = shippingCountry()->where('country', $shippingCountry['shipping_country'])->pluck('price')->first();
    
        // $total = ($subtotal + $shipping_price);
        // $data = [
        //     'subtotal' => formatPrice($subtotal),
        //     'cart' => $cart_items,
        //     'shipping_price' => formatPrice($shipping_price),
        //     'total' => formatPrice($total),
        // ];
    
        // $response = ['message' => 'Coupon removed!', 'status' => 'success', "data" => $data];
    
        // return response()->json($response);
        
            $shipping = new UpdateShipping ;
            $response = $shipping->update($request);
            
            $response['message'] = 'Coupon removed!';
            $response['status'] = 'success';
            return response()->json($response);
    }
    

    public function randomStr(){
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pin = mt_rand(111, 999). $characters[rand(0, strlen($characters) - 1)];

            $string = str_shuffle($pin);

            return $string;

    }
}
