<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductMedia;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Traits\UploadTrait;

use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;

class ProductController extends Controller
{

    use UploadTrait;

    /**
     * Display a listing of the users
     *
     * @param  \App\Models\Product $model
     * @return \Illuminate\View\View
     */
    public function index(Product $model)
    {
        return view('products.index', ['products' => $model->paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ProductStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductStoreRequest $request)
    {
        if($request->has('images')) {
            $save_images = array();
            $images = $request->file('images');
            foreach($images as $image){
                $media = $this->uploadOne($image);
                $save_images[] = $media->id;
            }
        }
        $product = Product::create($request->all());
        foreach($save_images as $image_id){
            $args = [
                'media_id' => $image_id,
                'product_id' => $product->id
            ];
            ProductMedia::create($args);
        }
        return redirect()->route('products.index')
            ->with('success', 'Product created successfully.');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ProductUpdateRequest  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {

        if($request->has('new_images')) {
            $save_images = array();
            $images = $request->file('new_images');
            foreach($images as $image){
                $media = $this->uploadOne($image);
                $save_images[] = $media->id;
            }
        }

        $product->update($request->all());
        foreach($save_images as $image_id){
            $args = [
                'media_id' => $image_id,
                'product_id' => $product->id
            ];
            ProductMedia::create($args);
        }

        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully');
    }
}
