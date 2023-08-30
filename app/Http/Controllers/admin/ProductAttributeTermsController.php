<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Attribute;
use App\Models\admin\AttributeTerm;
use App\Http\Requests\ProductTermRequest;

class ProductAttributeTermsController extends Controller
{
    public function index()
    {
        $attribute = AttributeTerm::get();
        return view('admin.attributeTerms.list', compact('attribute'));
    }

    public function add($id)
    {

        $attributeName = Attribute::select('attribute_name', 'id', 'attribute_type')->find($id);
        $attributesTerms = AttributeTerm::where('attributes_id', $id)->get();

        $attributesTermsWh = AttributeTerm::select('attribute_term_kWh_name')->get()->unique('attribute_term_kWh_name');
        return view('admin.attributeTerms.add', compact('attributeName', 'attributesTerms', 'attributesTermsWh'));
    }

    public function store(ProductTermRequest $request)
    {
        $terms = new AttributeTerm;
        $terms->attribute_term_name = $request->attribute_term_name;
        $terms->attributes_id = $request->attributes_id;
        $terms->price = $request->price;
        $terms->sku = $request->sku;
        $terms->product_availability = $request->product_availability;
        $terms->quantity = $request->quantity;
        $terms->attribute_term_description = $request->attribute_term_description;
        $terms->attribute_term_kWh_name = $request->attribute_term_kWh_name;
        $terms->attribute_terms_status = $request->attribute_terms_status;
        $terms->component_description = $request->component_description;
        $terms->wh_range = implode(',', $request['supported_wh'] ?? []);
         if ($request->hasFile('image')) {

            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();

            $image->move(public_path('uploads'), $filename);

            $terms->image = $filename;
            // Save the filename or perform further operations
        }
        $terms->save();

        return back()->with('success', 'Attribute Terms created successfully.');
    }

    public function edit($id)
    {

        $attributeTerms = AttributeTerm::with('attribute')->find($id);
        $attributesTermsWh = AttributeTerm::select('attribute_term_kWh_name')->get()->unique('attribute_term_kWh_name');
        // dd($attributeName);
        return view('admin.attributeTerms.edit',compact('attributeTerms','attributesTermsWh'));
    }

    public function update($id,Request $request ){
        $attributeTerms = AttributeTerm::find($id);

        $input = $request->all();
        if (!empty($request->wh_range)) {
            $input['wh_range'] = implode(',',$request->wh_range);
        }
        if($request->image){
            $image = $request->file('image');
            $filename = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $filename);
            $input['image'] = $filename;
        }

        $result = $attributeTerms->update($input);
        return back()->with('success', 'Attribute Terms Updated successfully.');
    }

    public function delete($id)
    {
        // dd($id);
        AttributeTerm::find($id)->delete();
        return redirect()->back()->with('success', 'Attribute Terms Deleted successfully.');
    }
}
