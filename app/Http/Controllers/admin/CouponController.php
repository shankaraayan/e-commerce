<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Coupon;
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

             // return today();
             if(today() > $coupon->expiry_date){
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

            foreach ($cart as &$item) {
                if (isset($item['product_id'])) {
                    $item['discount'] = [
                        'code' => $coupon->code,
                        'type' => $coupon->appliable_on,
                        'discount_value' => $coupon->price,
                    ];
                }
            }

            $cart = session()->put('cart', $cart);
            // return $cart;

            $response = ['message' => 'Coupon Applied!','status' => 'success',];
            return json_encode($response);
        } else {
            $response = ['message' => 'Coupon Not Found!','status' => 'faild',];
            return json_encode($response);
        }
    }

    public function randomStr(){
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pin = mt_rand(111, 999). $characters[rand(0, strlen($characters) - 1)];

            $string = str_shuffle($pin);

            return $string;

    }
}
