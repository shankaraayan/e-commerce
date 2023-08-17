<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Slider;
use App\Models\admin\Address;
use App\Http\Request\SliderRequest;
use Illuminate\Support\Facades\Redirect;

class SettingController extends Controller
{

    //*Sliders
    public function index(){
        $sliders = Slider::paginate(10);
        return view('admin.settings.sliders',compact('sliders'));
    }

    public function add(){
        return view('admin.settings.add_slider');
    }

    public function upload(Request $request){
        if($request){
            $slider = new Slider;
            if($request->screen=="global_banner"){
                $slider->global_banner = 1;
            }
            $slider->status = $request->status;
            $slider->slider_url = $request->slider_url;
            
            if($request->phone){
                $image = $request->file('phone');
                $filename = uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/sliders/phone'), $filename);
                $slider->phone = $filename;
                // return redirect()->route('admin.settings.slider.list')->with('success', 'Slider uploaded successfully.');
            }
            
            if($request->desktop){
                $image = $request->file('desktop');
                $filename = uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/sliders/desktop'), $filename);
                $slider->desktop = $filename;
            }
            
            $slider->save();
            return redirect()->route('admin.settings.slider.list')->with('success', 'Slider uploaded successfully.');
        }
        else{
            return redirect()->back()->withErrors($request->errors())->withInput();
        }

    }

    public function edit_slider($id){

        $slider = Slider::find($id);
        return view('admin.settings.edit_slider',compact('slider'));

    }

    public function update_slider($id,Request $request){

        $slider = Slider::find($id);

        if($request->phone){
            $image = $request->file('phone');
            $filename = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/sliders/phone'), $filename);
            $slider->phone = $filename;
            // return redirect()->route('admin.settings.slider.list')->with('success', 'Slider uploaded successfully.');
        }
        
        if($request->desktop){
            $image = $request->file('desktop');
            $filename = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/sliders/desktop'), $filename);
            $slider->desktop = $filename;
        }

        $slider->slider_url = $request->slider_url;
        $slider->status = $request->status;
        $slider->save();
        return redirect()->route('admin.settings.slider.list')->with('success', 'Slider updated successfully.');
    }

    public function delete_slider($id){
        $slider = Slider::find($id);
        if(@$slider->desktop){
            $file_path = public_path('uploads/sliders/desktop/'.$slider->slider);
        }

        if(@$slider->phone){
            $file_path = public_path('uploads/sliders/phone/'.$slider->slider);
        }
        
        unlink($file_path);
        $slider->delete();
        return redirect()->route('admin.settings.slider.list')->with('success', 'Slider deleted successfully.');
    }


     // footer
     public function footer(){
        $address = Address::all();
        return view('admin.settings.footer',compact('address'));
    }

    public function add_foooter(){

        return view('admin.settings.add_footer');
    }

    public function add_address(Request $request){
        $address = new Address;
        $address->ware_house_name = $request->warehouse_name;
        $address->email = $request->email;
        $address->mobile = $request->mobile;
        $address->pincode = $request->pincode;
        $address->country = $request->country;
        $address->address = $request->address;
        $address->vat = $request->vat;
        $address->save();
        return redirect()->back();
    }

    public function edit_address($id){
        $address = Address::where('id',$id)->first();
        return view('admin.settings.edit_footer',compact('address'));
    }

    public function update_address($id,Request $request){

        $address = Address::find($id);
        $address->ware_house_name = $request->warehouse_name;
        $address->email = $request->email;
        $address->mobile = $request->mobile;
        $address->pincode = $request->pincode;
        $address->country = $request->country;
        $address->address = $request->address;
        $address->vat = $request->vat;
        $address->update();
        return redirect()->back();

    }


    public function view_address($id){
        $address = Address::where('id',$id)->first();

        return view('admin.settings.view_footer',compact('address'));

    }

    public function delete_address($id){
        $address = Address::find($id);
        $address->delete();
        return redirect()->back();
    }
}
