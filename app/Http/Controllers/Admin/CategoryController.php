<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoriesList = Category::latest()->get();
        return view('admin.category.category_list', compact('categoriesList'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'cat_name_en' => 'required',
            'cat_name_ua' => 'required',
            'cat_image' => 'required',
        ],[
            'cat_name_en.required' => 'Please input Category name in English',
            'cat_name_ua.required' => 'Please input Category name in Ukraine',
        ]);

        $image = $request->file('cat_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300,300)->save('upload/category/'.$name_gen);
        $save_url = 'upload/category/'.$name_gen;

        Category::insert([
            'cat_name_en' => $request->cat_name_en,
            'cat_name_ua' => $request->cat_name_ua,
            'cat_description_en' => $request->cat_description_en,
            'cat_description_ua' => $request->cat_description_ua,
            'cat_slug_en' => strtolower(str_replace(' ', '-', $request->cat_name_en)),
            'cat_slug_ua' => str_replace(' ', '-', $request->cat_name_ua),
            'cat_image' => $save_url,

        ]);

        $notification = [
            'message' => 'Category name added Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoryEdit = Category::findOrFail($id);
        return view('admin.category.edit_category', compact('categoryEdit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $catId = $request->id;
        $old_img = $request->old_image;

        if($request->file('cat_image')) {
            unlink($old_img);
            $image = $request->file('cat_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('upload/category/'.$name_gen);
            $save_url = 'upload/category/'.$name_gen;

            Category::findOrFail($catId)->update([
                'cat_name_en' => $request->cat_name_en,
                'cat_name_ua' => $request->cat_name_ua,
                'cat_description_en' => $request->cat_description_en,
                'cat_description_ua' => $request->cat_description_ua,
                'cat_slug_en' => strtolower(str_replace(' ', '-', $request->cat_name_en)),
                'cat_slug_ua' => str_replace(' ', '-', $request->cat_name_ua),
                'cat_image' => $save_url,

            ]);

            $notification = [
                'message' => 'Category card updated Successfully',
                'alert-type' => 'info'
            ];

            return redirect()->route('admin.category.category_list')->with($notification);

        } else {
            Category::findOrFail($catId)->update([
                'cat_name_en' => $request->cat_name_en,
                'cat_name_ua' => $request->cat_name_ua,
                'cat_description_en' => $request->cat_description_en,
                'cat_description_ua' => $request->cat_description_ua,
                'cat_slug_en' => strtolower(str_replace(' ', '-', $request->cat_name_en)),
                'cat_slug_ua' => str_replace(' ', '-', $request->cat_name_ua),

            ]);

            $notification = [
                'message' => 'Category card updated Successfully',
                'alert-type' => 'info'
            ];

            return redirect()->route('admin.category.category_list')->with($notification);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoryDelete = Category::findOrFail($id);
        $image = $categoryDelete->cat_image;
        unlink($image);

        Category::findOrFail($id)->delete();

        $notification = [
            'message' => 'Category Deleted!',
            'alert-type' => 'danger'
        ];

        return redirect()->back()->with($notification);


    }
}
