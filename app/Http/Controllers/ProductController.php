<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\admin\Attribute;
use App\Models\admin\AttributeTerm;
use App\Models\admin\Slider;
use App\Models\admin\Category;


class ProductController extends Controller
{

     public function productDetail($slug,Request $request)
    {
        // print_r($request->all());die;
        if (!empty($request->all())) {
            
            $terms = $request->all();
            
           $components = [];

            foreach ($terms as $term) {
                $component_description = AttributeTerm::where('id', $term)->pluck('component_description');
                if ($component_description->isNotEmpty()) {
                    $components[] = $component_description[0]; // Pluck returns a collection, so we access the first element
                }
            }
            
            $product = Product::with('images','categories')->where('slug',$slug)->first();
            if(!$product){
                return view('notFound');
            }
            $attributeIds = explode(',', $product->attributes_id);
            $attributeTermsIds = explode(',', $product->attributesTerms_id);
           
            $products = Product::where('slug','<>',$slug)->get();
            // Retrieve the attributes using the IDs
            // $attributes = Attribute::with('attributeTerms')->whereIn('id', $attributeIds)->get();
    
            // $attributes = Attribute::with(['attributeTerms' => function ($query) use ($attributeTermsIds) {
            //     $query->whereIn('id', $attributeTermsIds);
            // }])
            // ->whereIn('id', $attributeIds)
            // ->get();
            $attributes = Attribute::with(['attributeTerms' => function ($query) use ($attributeTermsIds) {
                $query->whereIn('id', $attributeTermsIds);
            }])
            ->whereIn('id', $attributeIds)
            ->whereHas('attributeTerms', function ($query) use ($attributeTermsIds) {
                $query->whereIn('id', $attributeTermsIds);
            })
            ->get();
            
            return view('pages.product-detail', compact('product', 'attributes','products','components'));
        } 
        else {
            $product = Product::with('images','categories')->where('slug',$slug)->first();
            if(!$product){
                return view('notFound');
            }
            $attributeIds = explode(',', $product->attributes_id);
            $attributeTermsIds = explode(',', $product->attributesTerms_id);
    
            $products = Product::where('slug','<>',$slug)->get();
            // Retrieve the attributes using the IDs
            // $attributes = Attribute::with('attributeTerms')->whereIn('id', $attributeIds)->get();
    
            $attributes = Attribute::with(['attributeTerms' => function ($query) use ($attributeTermsIds) {
                $query->whereIn('id', $attributeTermsIds);
            }])
            ->whereIn('id', $attributeIds)
            ->get();
            return view('pages.product-detail', compact('product', 'attributes','products'));
        }
       
    }

    public function index()
    {
        $bestSellingProducts = Product::with('images')->where('best_selling',1)->get();
        

        $featuredProducts = Product::with('images')->where('featured',1)->get();
        $easyProducts = Product::with('images')->where('easy_peak_power',1)->get();
        $sliders = Slider::get();
        
        return view('pages.homepage', compact('bestSellingProducts','featuredProducts','easyProducts','sliders'));
    }

    public function attributeTerms(Request $request)
    {
        $getpanel = AttributeTerm::find($request->id);
        $panglwh = $getpanel->attribute_term_kWh_name;
        $absdk = AttributeTerm::select('*')
            ->whereRaw("FIND_IN_SET('$panglwh', wh_range) > 0")
            ->get();

        return response()->json($absdk);
    }

    public function attributeTermsAdmin($id){

        $terms = AttributeTerm::where('attributes_id',$id)->get();
        return response()->json($terms);
    }

    public function term_html_components(Request $request){
        $id = $request->id;
        $terms = AttributeTerm::find($id);
        return ($terms);
    }
}
