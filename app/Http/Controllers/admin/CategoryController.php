<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\admin\Category;


class CategoryController extends Controller
{
    public function index(){

        $category = Category::all();
        return view('admin.category.index', compact('category'));
    }

    public function add(){
        return view('admin.category.add');
    }

    public function insert(Request $request)
        {
            $category = new Category();
                $category->name = $request->input('name');
                $category->slug = $request->input('slug');
                $category->parent_id = $request->input('parent_cat');
                $category->description = $request->input('description');
                // $category->parent_id = $request->input('parent_id');
                $category->header = $request->heading;
                $category->on_catalog = $request->on_catalog;
                if ($request->category_image) {
                    $image = $request->file('category_image');
                    $filename = time() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('uploads/category'), $filename);
                    $category->image = $filename;
                }
                if ($request->banner) {
                    $image = $request->file('banner');
                    $filename = time() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('uploads/category'), $filename);
                    $category->banner = $filename;
                }

                $category->save();
                return redirect()->back()->with('success', 'Category created successfully.');
                //  print_r("Category addition successful");
        }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);

         if ($request->category_image) {
            // $file_path = public_path('uploads/category/'.$category->image);
            // if(file_exists($file_path)){
            //     unlink($file_path);
            // }
            $image = $request->file('category_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/category'), $filename);
            $category->image = $filename;
        }
        if ($request->banner) {
            // $file_path = public_path('uploads/category/'.$category->banner);
            // if(file_exists($file_path)){
            //     unlink($file_path);
            // }
            $image = $request->file('banner');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/category'), $filename);
            $category->banner = $filename;
        }

        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->description = $request->input('description');
        $category->parent_id = $request->input('parent_cat');
        $category->on_catalog = $request->input('on_catalog');
        $category->update();
        return redirect()->back()->with('success', 'Category Updated Successfully.');
    }

    public function delete($id)
    {
        $category = Category::find($id);
        $file_path = public_path('uploads/category/'.$category->image);
        // $file_path = public_path('uploads/category/'.$category->banner);
        $category->delete();
        return redirect()->back();
    }

    public function getSubcategories(Request $request)
    {
        $categoryId = $request->input('category_id');
        $subcategories = Category::where('parent_id', $categoryId)->get(['id', 'name']);
        return response()->json($subcategories);
    }


}
