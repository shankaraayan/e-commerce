<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Product;
use App\Models\admin\Attribute;
use App\Models\admin\ProductImages;
use App\Http\Requests\ProductAdminRequest;
use App\Models\admin\Attribute as AdminAttribute;
use App\Models\admin\AttributeTerm;
use App\Models\admin\ProductAttribute;
use App\Models\admin\ProductTerm;
use App\Models\Product as ModelsProduct;

use Illuminate\Support\Facades\Validator;

class AdminProductController extends Controller
{
    public function index()
    {
        $product = Product::get();
        return view('admin.product.list', compact('product'));
    }

    public function add()
    {
        $attributes = Attribute::get();
        $attributesTerms = AttributeTerm::where('attribute_type','panel')->get();
        // dd($attributesTerms);
        return view('admin.product.add',compact('attributes','attributesTerms'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_name' => 'required',
            'product_description' => 'required',
            'price' => 'required',
            'shipping' => 'required',
        ]);

        if ($validator->fails()) {

            // $request->session()->flash('error', 'Validation failed');

            return response()->json([
                'message' => 'Validation failed',
                'input_errors' => $validator->errors(),
                'status' => false,
            ], 422);


        }

        $array = json_decode($request->selectedOptions, true);
        $values = [];
        // dd($request->all());
        if(!empty($array))
        {
            foreach ($array as $subArray)
            {
                $values = array_merge($values, $subArray);
            }
        }


        $input = $request->all();

        if ($request->hasFile('thumb_image'))
        {
            $image = $request->file('thumb_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $filename);

            // Save the filename or perform further operations
        }

        $input['thumb_image'] = $filename ?? '';
        $input['type'] = $request->type;
        $input['status'] = $request->status;

        $selectedOptions = $request->input('options', []);

        $selectedOptionsTerms = $request->input('optionTerms', []);
        // dd($request->$selectedOptionsTerms);
        $input['categories'] =$request->categories;

        $input['subcategory_id'] = $request->subcategory;
        $input['estimate_deliver_date'] = $request->estimate_deliver_date;
        $input['attributes_id'] = implode(',', $selectedOptions);
        $input['attributesTerms_id'] = implode(',', $selectedOptionsTerms);
        // dd($input['attributesTerms_id']);

        $input['shipping_class'] = $request->shipping;
        // dd($input);

        $product = Product::create($input);

        //  $attributes = Attribute::where('id',$request->options->id)->get();
        //  dd($request->options );

        if ($request->hasFile('images')) {
            $images = $request->file('images');

            foreach ($images as $image) {

                $filename = uniqid() . '.' . $image->getClientOriginalExtension();

                // Save the image to the storage folder
                // $image->storeAs('public/images', $filename);

                 $image->move(public_path('uploads'), $filename);

                // Save the filename in the database
                $imageModel = new ProductImages();
                $imageModel->images = $filename;
                $imageModel->product_id = $product->id;
                $imageModel->save();
            }
        }
        return response()->json(['message' => 'Product Uploaded Successfully']);
        // return redirect()->route('admin.product.list')->with('success', 'Product Added Sucessfully.');
    }

    public function edit($id){
        $attributes = Attribute::get();
        $attributesTerms = AttributeTerm::get();
        // dd($attributesTerms);
        $editData = Product::find($id);
        // dd($editData);
        $productImages = ProductImages::where('product_id',$id)->get();
        return view('admin.product.edit',compact('editData','productImages','attributes','attributesTerms'));
    }

    public function update(ProductAdminRequest $request){

        //   dd($request->all());die;
        $options = is_array($request->options) ? implode(',', $request->options) : '';
        $dropdowns = is_array($request->dropdowns) ? implode(',', $request->dropdowns) : '';


        $editproduct = Product::find($request->productId);

        $editproduct->product_name = $request->product_name;
        $editproduct->attributes_id = $options;
        $editproduct->attributesTerms_id = $dropdowns;
        $editproduct->price = $request->price;
        $editproduct->product_description = $request->product_description;
        $editproduct->best_selling = $request->best_selling;
        $editproduct->featured = $request->featured;
        $editproduct->product_availability = $request->product_availability;
        $editproduct->shipping_class = $request->shipping;
        $editproduct->easy_peak_power = $request->easy_peak_power;
        $editproduct->mp_option1 = $request->mp_option1;
        $editproduct->type = $request->type;
        $editproduct->mp_option2 = $request->mp_option2;
        $editproduct->sale_price = $request->sale_price;
        $editproduct->offer_price = $request->offer_price;
        $editproduct->mp_option3 = $request->mp_option3;
        $editproduct->categories = $request->categories;
        $editproduct->subcategory_id = $request->subcategory;
        $editproduct->status = $request->status;
        $editproduct->sku = $request->sku;;
        $editproduct->estimate_deliver_date = $request->estimate_deliver_date;

        if ($request->hasFile('images')) {
            $images = $request->file('images');

            foreach ($images as $image) {

                $filename = uniqid() . '.' . $image->getClientOriginalExtension();

                // Save the image to the storage folder
                // $image->storeAs('public/images', $filename);

                 $image->move(public_path('uploads'), $filename);

                // Save the filename in the database
                $imageModel = new ProductImages();
                $imageModel->images = $filename;
                $imageModel->product_id = $editproduct->id;
                $imageModel->save();
            }
        }

        if ($request->hasFile('thumb_image'))
        {
            $image = $request->file('thumb_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $filename);
            $editproduct['thumb_image'] = $filename ?? '';// Save the filename or perform further operations
        }

        $editproduct->save();

        return redirect()->route('admin.product.list')->with('success', 'Product Updated Sucessfully.');
        // $editproduct->product_name = $editproduct->product_name;
   }

    public function view($id){
        $product = Product::find($id);
        return view('admin.product.view',compact('product'));
    }

    public function delete($id){
        $product = Product::find($id);
        $product->delete();
        return redirect()->back()->with('success', $product->product_name . ' Deleted Successfully');
    }
}
