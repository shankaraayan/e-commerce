<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Address;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use App\Models\Order;

class ProfileController extends Controller
{
    public function index(){
        return view('user.dashboard');
    }

     public function redirection(){
       
        return view('admin.dashboard');
    }

    public function account(){
        return view('user.profile.account');
    }

    public function address(){
        $id =  Auth::user()->id;
        $address = Address::where('user_id',$id)->first();
        return view('user.profile.address',compact('address'));
    }
    public function wishlist(){
        return view('user.wishlist.wishlist');
    }
    public function orders(){
        $id = Auth::user()->id;
        $orders = Order::where('user_id',$id)->get();
        return view('user.orders.order',compact('orders'));
    }

    public function order_details($orderId = null){
        if($orderId == null) return redirect()->back();

        $orders = Order::where('order_id',$orderId)->first();

        return view('user.orders.order-details',compact('orders'));

    }

    public function update_profile($id, Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone'=>'required'
        ],[
            'name.required' => 'Der Name ist erforderlich.',
            'phone.required' => 'Die Telefonnummer ist erforderlich.'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $user = User::find($id);
        $user->name = $request->name;
        $user->phone = $request->phone;
        
        $user->update();
        $request->session()->flash('success', 'Profile updated successfully');
        return redirect()->route('user.account')->with('sucess','profile updated successfullly');
    }
    
    public function change_password($id,Request $request){
        // print_r($request->all());die;
        $validator = Validator::make($request->all(), [
            'new_passwrod' => 'required|min:8|same:confirm_password',
            'confirm_password'=>'required'
        ],[
            'new_password.required' => 'Das neue Passwort ist erforderlich.',
            'new_password.min' => 'Das neue Passwort muss mindestens 8 Zeichen lang sein.',
            'new_password.same' => 'Das neue Passwort stimmt nicht mit der Bestätigung überein.',
            'confirm_password.required' => 'Die Passwort-Bestätigung ist erforderlich.'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
         $user = Auth::user();
         $user->password = Hash::make($request->input('new_password'));
         $user->save();
         $request->session()->flash('success', 'password updated successfullly');
         return redirect()->route('user.account')->with('sucess','password updated successfullly');
    }


    public function add_address($id,Request $request){
      
        // print_r($request->all());die;
        $validator = Validator::make($request->all(), [
            'fullname' => 'required',
            'country' => 'required',
            'street' => 'required',
            'pincode' => 'required',
            'apartment' => 'required',
            'city' => 'required',
            'phone' => 'required',
            'email' => 'required'
        ],[
            'fullname.required' => 'Der vollständige Name ist erforderlich.',
            'country.required' => 'Das Land ist erforderlich.',
            'street.required' => 'Die Straße ist erforderlich.',
            'pincode.required' => 'Die Postleitzahl ist erforderlich.',
            'apartment.required' => 'Die Apartmentnummer ist erforderlich.',
            'city.required' => 'Die Stadt ist erforderlich.',
            'phone.required' => 'Die Telefonnummer ist erforderlich.',
            'email.required' => 'Die E-Mail-Adresse ist erforderlich.'
        ]);

        if ($validator->fails()) {
            
            $error_type;
            if($request->address_type =="billing"){
                $error_type = $request->address_type;
            }else if($request->address_type =="delivery"){
                $error_type = $request->address_type;
            }
            
           return redirect()->back()->with('address_error_type',$error_type)->withErrors($validator)->withInput();
        }

        $address = Address::where('user_id',$id)->first();
    
        $data =  $request->except('_token');
        
        if(empty($address)){
            $new_address = new Address();
            if($data['address_type']=="billing"){
                $new_address->billing_address = $data;
                $new_address->user_id = $id;
            }
            if($data['address_type']=="delivery"){
                $new_address->shipping_address = $data;
            }
            $new_address->save();
            $request->session()->flash('success', 'address added successfullly');
            return redirect()->route('user.address');die;
        }else{
            if($data['address_type']=="billing"){
                $address->billing_address = $data;
            }
            if($data['address_type']=="delivery"){
                $address->shipping_address = $data;
            }
            $address->update();
        }
        $request->session()->flash('success', 'address updated successfullly');
        return redirect()->route('user.address');
    }
    
}
