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
use App\Models\admin\Category;
use App\Models\admin\ProductAttribute;
use App\Models\admin\ProductTerm;
use App\Models\Product as ModelsProduct;
use App\Models\SkuCombination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;
use Symfony\Contracts\Service\Attribute\Required;

class AdminProductController extends Controller
{
    public function index()
    {
        $product = Product::paginate(15);
        return view('admin.product.list', compact('product'));
    }

    public function add()
    {
        $attributes = Attribute::get();
        $attributesTerms = AttributeTerm::where('attribute_type','panel')->get();
        return view('admin.product.add',compact('attributes','attributesTerms'));
    }

    public function store(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'product_name' => 'required',
            'product_description' => 'required',
            'price' => 'required|numeric|min:1',
            'sale_price' => 'nullable|numeric|min:1',
            'shipping' => 'required',
            'type' => 'required',
            'options' => 'required_if:type,variable| min:1 | array',
            'selectedOption' => 'array|min:1',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'input_errors' => $validator->errors(),
                'status' => false,
            ], 422);
        }
        $array = json_decode($request->selectedOptions, true);
        $values = [];
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
        }
        $input['thumb_image'] = $filename ?? '';
        $input['type'] = $request->type;
        $input['status'] = $request->status;

        $selectedOptions = $request->input('options', []);
        $selectedOptionsTerms = $request->input('optionTerms', []);
        $categories = $request->input('categories', []);

        $input['categories'] = implode(',', $categories);

        $input['subcategory_id'] = $request->subcategory;
        $input['product_availability'] = $request->product_availability;
        $input['attributes_id'] = implode(',', $selectedOptions);
        $input['attributesTerms_id'] = implode(',', $selectedOptionsTerms);
        $input['shipping_class'] = $request->shipping;
        $input['quantity'] = $request->quantity;
        $input['solar_product'] = $request->solar_product;
        $product = Product::create($input);

        if ($request->hasFile('images')) {
            $images = $request->file('images');
            foreach ($images as $image) {
                $filename = uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads'), $filename);
                $imageModel = new ProductImages();
                $imageModel->images = $filename;
                $imageModel->product_id = $product->id;
                $imageModel->save();
            }
        }

        $response  = $this->skuGroupCombination($product,$selectedOptions,$selectedOptionsTerms);
        // die;
        return response()->json(['message' => 'Product Uploaded Successfully']);
    }

    /**
     * this function is creating sku and variations
     * @param array product is array of new product
     * @param array $variations 
     * @param array $options is attribute terms of component
     */

    private function skuGroupCombination($product,$variations, $options)
    {
        //* Creating pair and matching with attribute and given options
        $attribute = [];
        foreach ($variations as $variation) {
            $attributeTerms = AttributeTerm::where('attributes_id', $variation)->pluck('id')->toArray();
            foreach($attributeTerms as $terms){
                if(in_array($terms,$options)){
                    $attribute[$variation][] = $terms;
                }
            }   
        }
        $attributes =  ($attribute);
        //* Genrating Combitions with given variations
        function generateCombinations($attributes, $currentIndex = 0, $currentCombination = [], &$allCombinations) {
            if ($currentIndex >= count($attributes)) {
                $allCombinations[] = $currentCombination;
                return;
            }
            $currentKey = array_keys($attributes)[$currentIndex];
            $currentOptions = $attributes[$currentKey];
        
            foreach ($currentOptions as $option) {
                $newCombination = $currentCombination;
                $newCombination[$currentKey] = $option;
                generateCombinations($attributes, $currentIndex + 1, $newCombination, $allCombinations);
            }
        }
        //* genrating New SKU and assigning to variations
        $allCombinations = [];
        generateCombinations($attributes, 0, [], $allCombinations);
        $res = [];
        foreach ($allCombinations as $combination) {
            $res[rand(1111,9999)] = $combination;
        }
        
        //* Deleting old variations
        SkuCombination::where('product_id',$product->id)->delete();

        //* Entry with new SKU and variation
        foreach($res as $key=>$result)
        {
            $sku = new SkuCombination;
            $sku->product_id = $product->id;
            $sku->combination_ids = $result;
            $sku->save();
            //* Update with SKU
            $sku->sku = $product->sku.'-'.$sku->id;
            $sku->update();
        }
        return true;
    }
    

    public function edit($id){
        $attributes = Attribute::get();
        $attributesTerms = AttributeTerm::get();
        $editData = Product::find($id);
        $productImages = ProductImages::where('product_id',$id)->get();
        return view('admin.product.edit',compact('editData','productImages','attributes','attributesTerms'));
    }

    public function update(ProductAdminRequest $request)
    {

        $options = is_array($request->options) ? implode(',', $request->options) : '';
        $dropdowns = is_array($request->dropdowns) ? implode(',', $request->dropdowns) : '';

        $record = Product::where('id',$request->productId)->first();
        if (
            $request->has('options') && $options !== $record->attributes_id ||
            $request->has('sku') && $request->input('sku') !== $record->sku ||
            $request->has('dropdowns') && $dropdowns !== $record->attributesTerms_id
            ) {
            $change  = true;
        }
        else{$change  = false;}


        $variations = $request->options;
        $terms = $request->dropdowns;

        $categories = is_array($request->categories) ? implode(',', $request->categories) : '';
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
        $editproduct->categories = $categories;
        $editproduct->subcategory_id = $request->subcategory;
        $editproduct->status = $request->status;
        $editproduct->sku = $request->sku;
        $editproduct->quantity = $request->quantity;
        $editproduct->product_availability = $request->product_availability;
        $editproduct->solar_product = $request->solar_product;

        if ($request->hasFile('images')) {
            $images = $request->file('images');
            foreach ($images as $image) {
                $filename = uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads'), $filename);
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
            $editproduct['thumb_image'] = $filename ?? '';
        }
        $editproduct->save();

        if ($change) {
            $response  = $this->skuGroupCombination($editproduct,$variations,$terms);
        }

        return redirect()->route('admin.product.list')->with('success', 'Product Updated Sucessfully.');
   }

    public function view($id){
        $product = Product::find($id);
        return view('admin.product.view',compact('product'));
    }

    public function delete($id){
        SkuCombination::where('product_id',$id)->delete();
        $product = Product::find($id);
        $product->delete();
        return redirect()->back()->with('success', $product->product_name . ' Deleted Successfully');
    }

    public function generateProductFeed($slug)
    {
        $product = Product::with([
            'images',
            'groupSkus'
        ])
        ->where('slug', $slug)
        ->first();
    
        if ($product) {
            $categoryIds = explode(',', $product->categories); // Assuming column name is 'categories'
            $categories = Category::whereIn('id', $categoryIds)->get();
            $product['categories'] = $categories;
        } 
        
        $feedContent = view('admin.product.feed', ['product' => $product])->render();
        return response($feedContent)->header('Content-Type', 'text/xml');
        
    }

    private function convertToXml($data)
    {
        // Create a new SimpleXMLElement
        $xml = new \SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><product></product>');

        // Loop through the data and add XML elements
        foreach ($data as $key => $value) {
            $xml->addChild($key, htmlspecialchars($value));
        }

        // Convert SimpleXMLElement to XML string
        return $xml->asXML();
    }

    public function shorting_row(Request $request)
    {

        foreach($request->all() as $input){
            // $table = $input['table'];
            // dd($table);
            DB::table($input['table'])->where('id', $input['row_id'])->update(['serial' => $input['position']]);

        }
        return true;
    }
    public function findCombination(Request $request)
    {
        // dd($request->all());
        $options = array_values($request->terms);
        // dd($options);
        $product = Product::find($request->product_id);
        $attributeIDs = is_array($product->attributes_id) ? $product->attributes_id : [];
    
        $attribute = [];
        foreach ($attributeIDs as $variation) {
            $attributeTerms = AttributeTerm::where('attributes_id', $variation)->pluck('id')->toArray();
            foreach ($attributeTerms as $terms) {
                if (in_array($terms, $options)) {
                    $attribute[$variation][] = $terms;
                }
            }
        }
        $attributes = ($attribute);
        dd($attributes);
    }
    

}
