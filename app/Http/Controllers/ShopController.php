<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Categor;
use App\Models\admin\Category;

class ShopController extends Controller
{
    public function index($slug = null){

        $products = Product::with('categories')->get();
        $Category = Category::all();
        $category_id = '';
        if($slug){

            $category_id = $slug;
             $products = Product::where('categories',$slug)->with('categories')->get();

             if($products->count() === 0){
                 return redirect()->back()->with('sucess','sdsa');
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
