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
        $terms->attribute_term_description = $request->attribute_term_description;
        $terms->attribute_term_kWh_name = $request->attribute_term_kWh_name;
        $terms->attribute_terms_status = $request->attribute_terms_status;
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

        $attributeTerms = AttributeTerm::find($id);
        // dd($attributeName);
        return view('admin.attributeTerms.edit',compact('attributeTerms'));
    }

    public function update($id, Request $request ){
        $attributeTerms = AttributeTerm::find($id);

        $input = $request->all();
        // dd($input);
        if($request->image){

            $image = $request->file('image');

            // Generate a unique filename with timestamp
            $filename = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $filename);

            // Save the image to the storage folder
            $input['image'] = $filename;
        }

        $result = $attributeTerms->update($input);
        // dd($result);
        return back()->with('success', 'Attribute Terms Updated successfully.');
    }

    public function delete($id)
    {
        // dd($id);
        AttributeTerm::find($id)->delete();
        return redirect()->back()->with('success', 'Attribute Terms Deleted successfully.');
    }
}
