<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\countryModel;
use App\Models\Shipping;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Services\UpdateShipping;

class ShippingController extends Controller
{
    public function index(){

        $shipping = Shipping::paginate(10);
        return view('admin.shipping.list',compact('shipping'));
    }
    // public function get_shipping_class(){
    //     $shipping = Shipping::get();
    //     return response()->json($shipping);
    // }

    public function get_shipping_class(){
        $shippin_data = [];
        $shipping = Shipping::all();
    
        foreach ($shipping as $value) {
            $shippin_data[] = [
                'shipping_id' => $value->id,
                'shipping_name' => $value->name,
            ];
        }
    
        return $this->successResponse('Shipping Class Found',$shippin_data);

    }
    

    public function add(){
        return view('admin.shipping.add');
    }

    public function store(Request $request){
        $saveShipping = new Shipping();
        $saveShipping->name = $request->name;
        $saveShipping->status = $request->status;
        $saveShipping->save();

        // return redirect()-back()->with('sucess','Shipping Add Sucessfully');
        return redirect()->back()->with('success', 'Shipping Added Successfully');
    }
    public function update(Request $request){

        $saveShipping = Shipping::find($request->shipping_id);
        $saveShipping->name = $request->name;
        if($request->status == 1){
            $saveShipping->status = 1;
        }else{
            $saveShipping->status = 0;
        }

        $saveShipping->save();

        // return redirect()-back()->with('sucess','Shipping Add Sucessfully');
        return redirect()->back()->with('success', 'Shipping Updated Successfully');
    }

    public function delete($id){
        if(Product::where('shipping_class',$id)->exists()) return redirect()->back()->with('error', 'The shipping class is being used in some of the products. Please remove it from those products first.');
        Shipping::find($id)->delete();

        return redirect()->back()->with('success', 'Shipping Deleted Successfully');
    }

    public function countryIndex($idShipping = null){
        $id = $idShipping;
        $countryShipping = countryModel::where('shipping_id',$id)->get();
        return view('admin.shipping.countryShipping.list',compact('countryShipping','id'));
    }

    public function countryAdd($id){
        $shippingId = $id;
        return view('admin.shipping.countryShipping.add',compact('shippingId'));
    }

    public function countryStore(Request $request){
        $saveShipping = new countryModel();
        $saveShipping->name = $request->name;
        $saveShipping->country = $request->country;
        $saveShipping->price = $request->price;
        $saveShipping->shipping_id = $request->shipping_id;
        $saveShipping->status = $request->status;
        $saveShipping->save();

        // return redirect()-back()->with('sucess','Shipping Add Sucessfully');
        return redirect()->back()->with('success', 'Shipping Added Successfully');
    }

    public function countryUpdate(Request $request){
        // dd($request->name);
        $saveShippingCountry = countryModel::find($request->shipping_id);
        $saveShippingCountry->name = $request->name;
        $saveShippingCountry->status = $request->status;
        $saveShippingCountry->country = $request->country;
        $saveShippingCountry->price = $request->price;
        $saveShippingCountry->shipping_id = $saveShippingCountry->shipping_id;

        $saveShippingCountry->save();

        // return redirect()-back()->with('sucess','Shipping Add Sucessfully');
        return redirect()->back()->with('success', 'Shipping Updated Successfully');
    }

    public function countryDelete($id){
        countryModel::find($id)->delete();
        return redirect()->back()->with('success', 'Shipping Deleted Successfully');
    }

    public function shippingPrice(Request $request){
       
        $shipping = new UpdateShipping ;
        $response = $shipping->update($request);
        return response()->json($response);
    }

}
