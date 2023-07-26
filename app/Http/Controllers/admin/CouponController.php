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
    public  function edit_view(){

    }
    public  function store(Request $request){
        // dd($request->all());
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

        Coupon::create(
            [
                "code" => $code,
            ] + $request->all());

        return redirect()->back();

    }
    public  function update(){

    }
    public  function delete(){

    }

    public function randomStr(){
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $pin = mt_rand(111, 999). $characters[rand(0, strlen($characters) - 1)];

            $string = str_shuffle($pin);

            return $string;

    }
}
