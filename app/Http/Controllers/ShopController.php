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
        $catalog = Category::where('parent_id','0')->where('on_catalog','1')->paginate(10);
        return view('pages.catalog',compact('Category','catalog'));
    }

    public function index(Request $request, $slug){
        // return $request->all();
        $products = Product::with('categories')
        ->where('status', 1)
        ->paginate(10);
        $Category = Category::where('parent_id','0')->get();
        $category_id = '';

        if($slug){
            $category_id = Category::where('slug',$slug)->pluck('id')->first();

            $products = Product::where(function($q) use ($category_id){
                $q->whereRaw("FIND_IN_SET($category_id, categories)");
            })
            ->with('categories')
            ->where('status', 1)
            ->paginate(10);
             if($products->count() === 0){
                 return redirect()->back()->with('error','No Product Found.');
             }
        }
        return view('pages.shop',compact('products','category_id','Category'));

    }


    public function categoriesProduct(Request $request){
        $category_id  = '';
        if($request->category){
            $category_id = Category::where('slug',$request->category)->pluck('id')->first();
            // return $category_id;
        }
        else{
            $category_id  = $request->category_id;
        }
        
        $products = Product::where('status', 1)
            ->where(function ($query) use ($category_id) {
                $query->where('categories', $category_id)
                    ->orWhere('subcategory_id', $category_id);
            });

        if(isset($request->shortBy) && $request->shortBy === 'high_to_low'){
            $products = $products->orderBy('price','DESC');
        }
        if(isset($request->shortBy) && $request->shortBy === 'low_to_high'){
            $products = $products->where('type','single')->orderBy('price','ASC');
        }
        if(isset($request->shortBy) && $request->shortBy === 'popularity'){
            $products =  $products->where('best_selling',1);
        }

        $products = $products->get();
       
        return response()->json(['products'=>$products]);
    }

}



