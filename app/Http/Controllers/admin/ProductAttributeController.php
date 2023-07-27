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
        $attribute = Attribute::with([
            'attributeTerms:id,attributes_id,attribute_term_name'
        ])->get();

        // dd($attribute);
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
        // dd($input);
        $input['attribute_status'] = $request->input('status') == null ? 0: 1 ;
        $attribute = Attribute::create($input);
        return back()->with('success', 'Attribute created successfully.');
    }

    public function view($id){
        $attribute = Attribute::find($id);
        return view('admin.productAttributes.view',compact('attribute'));

    }

    public function edit($id){
        $editAttribute = Attribute::where('id',$id)->first();
        // dd($editAttribute);
        $getpanelsss = AttributeTerm::get();
        $attributeTypes = Attributetype::get();
        return view('admin.productAttributes.edit',compact('editAttribute','getpanelsss','attributeTypes'));
    }



    public function update(Request $request){
        $input = $request->all();
        $input['attribute_status'] = $request->input('status') == null ? 0: 1 ;

        $attribute = Attribute::find($request->attribute_id);
        $attribute->update($input);

        return back()->with('success', 'Attribute Updated successfully.');

    }

    public function update_attribute_status(Request $request){

        $attribute = Attribute::find($request->id);
        $response = [];

        if($request->status=="true"){
             $status['attribute_status'] = 1;
             $response['status'] = 1;
             $response['checked'] = true;
        }else{
             $status['attribute_status'] = 0;
              $response['status'] = 0;
              $response['checked'] = false;
        }

        if($attribute->update($status)){
            return response()->json($response);
        }
    }
      public function delete($id){
        $deleteAttribute = Attribute::find($id)->delete();
        return back()->with('success', 'Attribute Deleted successfully.');
    }


    public function new(Request $request){
        $getpanel = AttributeTerm::find($request->id);
        $panglwh = $getpanel->attribute_term_kWh_name;
        $absdk = AttributeTerm::select('*')
        ->whereRaw("FIND_IN_SET('$panglwh', wh_range) > 0")
        ->get();

        return view('pages.product-detail',compact('absdk'));
    }

    // product attribute type

    public function create_attribute_type(Request $request){
        $newAttributeTypes = new Attributetype;
        $isCreated = $newAttributeTypes::create([
            "name" => $request->attribute_type_name
        ]);
        if($isCreated){
            return response()->json(["message"=>"create success"]);
        }
    }

    public function update_attribute_type(Request $request){

        if(!@empty($request->id)){

            $type = Attributetype::find($request->id);
            $option['name'] = $request->attribute_type_name;
            $type->update($option);
            return response()->json(["message"=>"update success"]);
        }
    }

    public function delete_attribute_type(Request $request){
        if($request->id){

            $type = Attributetype::find($request->id);
            $type->delete();
            return response()->json(["message"=>" delete success"]);die;
        }
    }
}
