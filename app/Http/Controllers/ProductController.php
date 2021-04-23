<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Media;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Traits\UploadTrait;

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price_year' => 'required',
        ]);
        if($request->has('images')) {
            $save_images = array();
            $images = $request->file('images');
            foreach($images as $image){
                $filename = $image->getClientOriginalName();
                $media = $this->uploadOne($image, 'image', 'public', $filename);
                $save_images[] = $media->id;
            }
            $request = new Request($request->all());
            $request->merge(['images' => json_encode($save_images)]);
        }
        Product::create($request->all());

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
        if($product->images){
            $images = json_decode($product->images, true);
            $array = array();
            foreach($images as $image){
                $media = Media::where('id' , '=' , $image)->first();
                $array[] = $media;
            }
            $product->images = $array;
        }
        $product->agent_name = '';
        if($product->agent_id){
            $agent = User::where('id' , '=' , $product->agent_id)->first();
            $product->agent_name = $agent->surname . ' ' . $agent->name . ' ' . $agent->patronymic;
        }

        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        if($product->images){
            $images = json_decode($product->images, true);
            $array = array();
            foreach($images as $image){
                $media = Media::where('id' , '=' , $image)->first();
                $array[] = $media;
            }
            $product->images = $array;
        }
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price_year' => 'required',

        ]);
        if($request->has('new_images')) {
            $save_images = array();
            $images = $request->file('new_images');
            foreach($images as $image){
                $filename = $image->getClientOriginalName();
                $media = $this->uploadOne($image, 'image', 'public', $filename);
                $save_images[] = $media->id;
            }
            $request = new Request($request->all());
            $request->merge(['images' => json_encode($save_images)]);
        }
        $product->update($request->all());

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
