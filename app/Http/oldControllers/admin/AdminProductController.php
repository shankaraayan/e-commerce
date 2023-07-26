<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Product;
use App\Models\admin\ProductImages;
use App\Http\Requests\ProductAdminRequest;

class AdminProductController extends Controller
{
    public function index()
    {
        $product = Product::get();
        return view('admin.product.list', compact('product'));
    }

    public function add()
    {
        return view('admin.product.add');
    }

    public function store(ProductAdminRequest $request)
    {
        $input = $request->all();
       
        
           if ($request->hasFile('thumb_image')) {
            $image = $request->file('thumb_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $filename);
           
            // Save the filename or perform further operations
        }
        $input['thumb_image'] = $filename;
        $product = Product::create($input);

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

        return redirect()->route('admin.product.list')->with('error', 'No image Found.');
    }
}
