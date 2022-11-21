<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Product;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productsList = Product::latest()->get();
        return view('admin.product.product_list', compact('productsList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create_product');
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
            'prod_name_en' => 'required',
            'prod_description_en' => 'required',
            'prod_name_ua' => 'required',
            'prod_description_ua' => 'required',
            // 'category_id' => 'required',
            'prod_image' => 'required',
        ],[
            'prod_name_en.required' => 'Please input Category name in English',
            'prod_name_ua.required' => 'Додайте назву продукту українською',
        ]);

        $image = $request->file('prod_image');
        $nameProdGen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300,300)->save('upload/product/'.$nameProdGen);
        $save_url = 'upload/product/'.$nameProdGen;

        Product::insert([
            'prod_name_en' => $request->prod_name_en,
            'prod_description_en' => $request->prod_description_en,
            'prod_name_ua' => $request->prod_name_ua, 
            'prod_description_ua' => $request->prod_description_ua,
            // 'category_id' => $request->category_id,
            'price' => $request->price,
            'prod_slug_en' => strtolower(str_replace(' ', '-', $request->prod_name_en)),
            'prod_slug_ua' => str_replace(' ', '-', $request->prod_name_ua),
            'prod_image' => $save_url,

        ]);

        $notification = [
            'message' => 'Product card added Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('products.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productEdit = Product::findOrFail($id);
        return view('admin.product.edit_product', compact('productEdit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $prodId = $request->id;
        $image = $request->file('prod_image');
        $nameProd_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300,300)->save('upload/product/'.$nameProd_gen);
        $save_url = 'upload/product/'.$nameProd_gen;

        Product::findOrFail($prodId)->update([
            'prod_name_en' => $request->prod_name_en,
            'prod_description_en' => $request->prod_description_en,
            'prod_name_ua' => $request->prod_name_ua,
            'prod_description_ua' => $request->prod_description_ua,
            'prod_slug_en' => strtolower(str_replace(' ', '-', $request->prod_name_en)),
            'prod_slug_ua' => str_replace(' ', '-', $request->prod_name_ua),
            'price' => $request->price,
            'prod_image' => $save_url,
            'prod_rating' => $request->prod_rating,
            'category_id' => $request->category->id,

        ]);

        $notification = [
            'message' => 'Product card updated Successfully',
            'alert-type' => 'info'
        ];

        return redirect()->route('admin.product.product_list')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productDelete = Product::findOrFail($id);
        $image = $productDelete->prod_image;
        unlink($image);

        Product::findOrFail($id)->delete();

        $notification = [
            'message' => 'Category Deleted!',
            'alert-type' => 'danger'
        ];

        return redirect()->back()->with($notification);
    }
}
