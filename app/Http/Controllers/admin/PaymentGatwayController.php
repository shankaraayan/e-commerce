<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\PaymentGatway;

class PaymentGatwayController extends Controller
{
    public function payment_gatway_list(){
        $paymentGatway = PaymentGatway::paginate(10);
        return view('admin.settings.payment-gatway.list',compact('paymentGatway'));
    }


    public function add(){
        return view('admin.settings.payment-gatway.add');
    }
    public function upload(){
        //
    }
    public function edit_payment_gatway(){
        //
    }
    public function update_payment_gatway(){
        //
    }
    public function delete_payment_gatway(){
        //
    }    

    
}
