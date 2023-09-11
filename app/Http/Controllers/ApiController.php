<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\countryModel;
use App\Models\Order;
use App\Services\UpdateQuantity;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function index(){        
        try {
            $orders = Order::orderBy('id','DESC')->get();
            return response()->json(['order' => $orders]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Order not found'], 404);
        }
        
    }
    
    public function show(Request $request)
    {
        try {
            $order = Order::findOrFail($request->order_id);
            return response()->json(['order' => $order]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Order not found'], 404);
        }
    }

    public function update(Request $request)
    {
        try {
            $order = Order::findOrFail($request->order_id);

            // Update order based on request data
            // ...

            return response()->json(['message' => 'Order updated successfully', 'order' => $order]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while updating the order'], 500);
        }
    }

    public function destroy(Request $request)
    {
        try {
            $order = Order::findOrFail($request->order_id);
            $order->delete();
            
            return $this->successResponse('Order deleted successfully');
           
        } catch (\Exception $e) {
            return $this->errorResponse($e);
            // return response()->json(['error' => ''], 500);
        }
    }

    function updateOrderStatus(Request $request)
    {   
        try{
            (new UpdateQuantity)->updateOrderStatus($request->order_id, $request->status);
           return $this->successResponse('Updated');
        } catch (\Exception $e) {
            return $this->errorResponse($e);
        }
    }

   
}
