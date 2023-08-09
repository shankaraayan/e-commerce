<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\countryModel;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderApiController extends Controller
{
    public function index(){        
        try {
            $orders = Order::orderBy('id','DESC')->get();
            return response()->json(['order' => $orders]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Order not found'], 404);
        }
        
    }
    
    public function show($id)
    {
        try {
            $order = Order::findOrFail($id);

            return response()->json(['order' => $order]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Order not found'], 404);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $order = Order::findOrFail($id);

            // Update order based on request data
            // ...

            return response()->json(['message' => 'Order updated successfully', 'order' => $order]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while updating the order'], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $order = Order::findOrFail($id);
            $order->delete();

            return response()->json(['message' => 'Order deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while deleting the order'], 500);
        }
    }

   
}
