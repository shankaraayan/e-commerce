<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\FrontendController;
use Illuminate\Http\Request;
use App\Models\admin\PaymentGatway;
use App\Services\PaymentGatway\PaypalService;

class PaymentGatwayController extends Controller
{
    public function payment_gatway_list(){
        $paymentGatway = PaymentGatway::paginate(10);
        return view('admin.settings.payment-gatway.list',compact('paymentGatway'));
    }


    public function add(){
        return view('admin.settings.payment-gatway.add');
    }
    public function upload(Request $request)
    {
        if($request){
            $paymentGatway = new PaymentGatway;
            $paymentGatway->status = $request->status;
            $paymentGatway->mode = $request->mode;
            $paymentGatway->app_name = $request->app_name;
            $paymentGatway->app_id = $request->app_id;
            $paymentGatway->PAYPAL_CURRENCY = $request->PAYPAL_CURRENCY;
            $paymentGatway->API_KEY = $request->client_id;
            $paymentGatway->API_SECRET = $request->secret;
            $paymentGatway->PAYPAL_SUCCESS_URL = $request->PAYPAL_SUCCESS_URL;
            $paymentGatway->PAYPAL_FAILED_URL = $request->PAYPAL_FAILED_URL;
            
            if($request->logo){
                $image = $request->file('logo');
                $filename = uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/payment-gatway/'), $filename);
                $paymentGatway->logo = $filename;
            }
            
            $paymentGatway->save();
            return redirect()->route('admin.settings.payment-gatway.list')->with('success', 'Slider uploaded successfully.');
        }
        else{
            return redirect()->back()->withErrors($request->errors())->withInput();
        }
    }

    public function edit_payment_gatway($id){
        $gatway = PaymentGatway::find($id);
        return view('admin.settings.payment-gatway.edit',compact('gatway'));
    }
    public function update_payment_gatway($id,Request $request){
        $paymentGatway = PaymentGatway::find($id);
        
        if($request->logo){
            $image = $request->file('logo');
            $filename = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/payment-gatway/'), $filename);
            $paymentGatway->logo = $filename;
        }
        $paymentGatway->status = $request->status;
        $paymentGatway->mode = $request->mode;
        $paymentGatway->app_name = $request->app_name;
        $paymentGatway->app_id = $request->app_id;
        $paymentGatway->PAYPAL_CURRENCY = $request->PAYPAL_CURRENCY;
        $paymentGatway->API_KEY = $request->client_id;
        $paymentGatway->API_SECRET = $request->secret;
        $paymentGatway->PAYPAL_SUCCESS_URL = $request->PAYPAL_SUCCESS_URL;
        $paymentGatway->PAYPAL_FAILED_URL = $request->PAYPAL_FAILED_URL;
        
        $paymentGatway->save();
        return redirect()->route('admin.settings.payment-gatway.list')->with('success', 'Slider UPdated successfully.');
    }
    public function delete_payment_gatway($id){
        $gatway = PaymentGatway::find($id);
        $gatway->delete();
        return redirect()->route('admin.settings.payment-gatway.list')->with('success', 'Payment Method deleted successfully.');
    }    

    public function success(Request $request){
        return (new PaypalService)->paymentSuccess($request);
        // return view('pages.payment-success');
    }

    public function cancel(){
        return view('pages.payment-cencel');
    }    
   
    public function testView(){
        return "Do again";
    }
    
}
