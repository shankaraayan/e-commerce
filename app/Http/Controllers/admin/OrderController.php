<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\countryModel;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
       
        $orders = Order::orderBy('id','DESC')->get();
        return view('admin.orders.list',compact('orders'));
    }
    
    
    public function show($id){
         $orders = Order::find($id);
         return view('admin.orders.view',compact('orders'));
    }

   
}
