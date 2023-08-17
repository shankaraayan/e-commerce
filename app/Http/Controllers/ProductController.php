<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\admin\Attribute;
use App\Models\admin\AttributeTerm;
use App\Models\admin\Slider;
use App\Models\admin\Category;
use App\Models\admin\Order;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

     public function productDetail($slug,Request $request)
    {
     
       
        if (!empty($request->all())) {
            $terms = $request->all();
            $components = [];
            $termIds = array_values($terms);
            if ($request->has('page')){
                
            }
            else{
                
                $components = AttributeTerm::whereIn('id', $termIds)
                    ->orderByRaw(DB::raw("FIELD(id, " . implode(',', $termIds) . ")"))
                    ->get();
            }
            
            if($request->page){
                $product = Product::with('images','categories')
                ->where('slug',$slug)
                ->first();
            }else{
                $product = Product::with('images','categories')
                ->where('slug',$slug)
                ->where('status', '1')
                ->first();
            }
        
            
            if(!$product){
                return view('notFound');
            }
            $attributeIds = explode(',', $product->attributes_id);
            $attributeTermsIds = explode(',', $product->attributesTerms_id);
           
            $products = Product::where('slug','<>',$slug)->get();
           
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
            if($request->page){
                $product = Product::with('images','categories')
                ->where('slug',$slug)
                ->first();
            }else{
                $product = Product::with('images','categories')
                ->where('slug',$slug)
                ->where('status', '1')
                ->first();
            }
        
            if(!$product){
                return view('notFound');
            }
            $attributeIds = explode(',', $product->attributes_id);
            $attributeTermsIds = explode(',', $product->attributesTerms_id);
    
            $products = Product::where('slug','<>',$slug)
            ->where('status', '1')
            ->get();
            // Retrieve the attributes using the IDs
            // $attributes = Attribute::with('attributeTerms')->whereIn('id', $attributeIds)->get();
    
            $attributes = Attribute::with(['attributeTerms' => function ($query) use ($attributeTermsIds) {
                $query->whereIn('id', $attributeTermsIds);
            }])
            ->whereIn('id', $attributeIds)
            ->whereHas('attributeTerms', function ($query) use ($attributeTermsIds) {
                $query->whereIn('id', $attributeTermsIds);
            })
            ->get();
            return view('pages.product-detail', compact('product', 'attributes','products'));
        }
       
    }

    public function index()
    {
        $bestSellingProducts = Product::with('images')
        ->where('best_selling',1)
        ->where('status', 1)
        ->get();
    
        $featuredProducts = Product::with('images')->where('featured',1)->get();
        $easyProducts = Product::with('images')->where('easy_peak_power',1)->get();
        $sliders = Slider::where('global_banner', '!=','1')->get();
        
        return view('pages.homepage', compact('bestSellingProducts','featuredProducts','easyProducts','sliders'));
    }

    public function attributeTerms(Request $request)
    {
        $getpanel = AttributeTerm::find($request->id);
        $panglwh = $getpanel->attribute_term_kWh_name;
        $absdk = AttributeTerm::select('*')
            ->whereRaw("FIND_IN_SET('$panglwh', wh_range) > 0")
            ->get();
        $attribute = Attribute::find($getpanel->attributes_id);
        $arribute_name = $attribute->attribute_name;
        
        // return response()->json($absdk);
        
       
        return response()->json([
            '$arribute_name' =>  $arribute_name,
            'original_term' => $getpanel,
            'related_terms' => $absdk
        ]);
    }

    public function attributeTermsAdmin($id){

        $terms = AttributeTerm::where('attributes_id',$id)->get();
        return response()->json($terms);
    }

    public function term_html_components(Request $request) {
        $ids = $request->ids;
    
        $components = AttributeTerm::whereIn('id', $ids)
            ->orderByRaw(DB::raw("FIELD(id, " . implode(',', $ids) . ")"))
            ->get();
    
        return $components;
    }

    public function quick_view_products(Request $request){
        $slug = $request->slug;
        $product = Product::with('images','categories')->where('slug',$slug)->first();
        
        if ($product) {
            return response()->json($product);
        } else {
            // If the product with the specified ID is not found, you may return an error response or an empty response.
            return response()->json(['error' => 'Product not found'], 404);
        }
    }

   
}
