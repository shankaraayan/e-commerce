<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\admin\Attribute;
use App\Models\admin\AttributeTerm;
use App\Models\admin\Category;


class ProductController extends Controller
{

     public function productDetail($slug)
    {

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

    public function index()
    {
        $bestSellingProducts = Product::with('images')->where('best_selling',1)->get();

        $featuredProducts = Product::with('images')->where('featured',1)->get();
        $easyProducts = Product::with('images')->where('easy_peak_power',1)->get();
        return view('pages.homepage', compact('bestSellingProducts','featuredProducts','easyProducts'));
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
}
