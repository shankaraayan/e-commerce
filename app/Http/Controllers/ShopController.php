<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Categor;
use App\Models\admin\Category;

class ShopController extends Controller
{

    public function catalog(){
        $Category = Category::where('parent_id','0')->get();
        $catalog = Category::where('parent_id','0')->where('on_catalog','1')->get();
        return view('pages.catalog',compact('Category','catalog'));
    }

    public function index($slug){

        $products = Product::with('categories')->get();
        $Category = Category::where('parent_id','0')->get();
        $category_id = '';
        if($slug){
            $category_id = Category::where('slug',$slug)->pluck('id')->first();
            // $category_id = $slug;
             $products = Product::where('categories',$category_id)->with('categories')->get();

             if($products->count() === 0){
                 return redirect()->back()->with('error','No Product Found.');
             }
        }
        // print_r($products->toArray());die;
        return view('pages.shop',compact('products','category_id','Category'));

    }


    public function categoriesProduct(Request $request){

        $products = Product::where('categories',$request->category_id)->orWhere('subcategory_id',$request->category_id)->get();
        return response()->json(['products'=>$products]);
    }

}
