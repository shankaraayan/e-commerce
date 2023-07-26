<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\admin\Attribute;
use App\Models\admin\AttributeTerm;


class ProductController extends Controller
{  
    
    public function productDetail($id)
    {
        $product = Product::with('images')->find($id);
        $attributes = Attribute::with('attributeTerms')->get();
        // $attributeInverter = Attribute::with('attributeTerms')->where('attribute_type', 'inverter')->first();
        // $cable = Attribute::with('attributeTerms')->where('attribute_type', 'cable')->first();
        // $cableLength = Attribute::with('attributeTerms')->where('attribute_type', 'cable length')->first();

        return view('pages.product-detail', compact('product', 'attributes'));
    }

    public function index()
    {
        $bestSellingProducts = Product::with('images')->where('best_selling',1)->get(); 
        
        $featuredProducts = Product::with('images')->where('featured',1)->get(); 
        $easyProducts = Product::with('images')->where('easy_peak_power',1)->get(); 

        // echo "<pre>";
        // print_r($bestSellingProducts);
        // exit;
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
}
