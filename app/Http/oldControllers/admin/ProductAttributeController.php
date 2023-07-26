<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Attribute;
use App\Http\Requests\ProductRequest;
use App\Models\admin\Attributetype;
use App\Models\admin\AttributeTerm;


class ProductAttributeController extends Controller
{
    public function index(){
        $attribute = Attribute::get();
        return view('admin.productAttributes.list',compact('attribute'));
    }

    public function apiIndex(){
        $attribute = Attribute::with('attributeTerm')->get();
        return response()->json([
            "attributes" => $attribute,
        ]);
    }
    public function add(){
        $attributeTypes = Attributetype::get();
        return view('admin.productAttributes.add',compact('attributeTypes'));
    }

    public function store(ProductRequest $request){        
        $input = $request->all();
        $attribute = Attribute::create($input);
   
        return back()->with('success', 'User created successfully.');

    }

    public function view($id){        
        $attribute = Attribute::find($id);
        return view('admin.productAttributes.view',compact('attribute'));

    }

    public function edit(){
        $getpanels = Attribute::get();
        $getpanelsss = AttributeTerm::get();
        return view('welcome',compact('getpanels','getpanelsss'));
    }

    public function delete($id){
        $getpanels = Attribute::get();
        $getpanelsss = AttributeTerm::where('attributes_id',$id)->get();
        return view('welcome',compact('getpanelsss','getpanels'));
    }

    public function new(Request $request){
        $getpanel = AttributeTerm::find($request->id);
        
        
        $panglwh = $getpanel->attribute_term_kWh_name;
        $absdk = AttributeTerm::select('*')
        ->whereRaw("FIND_IN_SET('$panglwh', wh_range) > 0")
        ->get();
      
    //    foreach($absdk as $daat){
    //     echo $daat['id']. "\n";
    //    }
   
     
       
        
 
  

 

        
        
    //     exit;
      

        return view('pages.product-detail',compact('absdk'));
    }
}
