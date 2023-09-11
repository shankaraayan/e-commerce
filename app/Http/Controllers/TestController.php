<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\admin\AttributeTerm;
use App\Models\admin\Product;
use App\Models\Order;

class TestController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function email_view(){
        return "success";
    }

    public function view_order_email($id){
        $orders = Order::find($id);
        
        $data = [];
        $data['name'] = "prabhat kumar";
        $data['data'] = $orders;
        return view('emails.epp_order_confirm',compact('data'));
        // dd($data);
    }
  
 function working_days($days){
   $datee = date('Y-m-d');
   $date = \Carbon\Carbon::createFromFormat('Y-m-d', $datee);
   return $date->addWeekdays($days)->format('d-m-Y');
}
   
}
