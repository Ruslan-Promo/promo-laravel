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
use App\Models\Category;
use App\Models\StatusesProduct;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    use UploadTrait;

    /**
     * Display a listing of the products
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $user = Auth::user();
        if($user->isAgent()){
            $params['products'] = Product::ByAgent($user->agent->id)->paginate(15);
            return view('products.agent.index', $params);
        }

        $params['products'] = Product::paginate(15);
        return view('products.index', $params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        if (!$user->can('create', Product::class)) {
            return redirect()->route('products.index')
            ->with('forbidden', 'Forbidden to create a product.');
        }else{
            if($user->isAgent()){
                return view('products.agent.create', ['categories' => Category::all(), 'statuses' => StatusesProduct::all()]);
            }
            return view('products.create', ['categories' => Category::all(), 'statuses' => StatusesProduct::all()]);
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ProductStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductStoreRequest $request)
    {
        $user = Auth::user();
        if($user->isAgent()){
            $agent_id = $user->agent->id;
            $request->request->add(['agent_id' => $agent_id]);
        }
        if($request->has('images')) {
            $save_images = [];
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
        $user = Auth::user();
        if (!$user->can('view', $product)) {
            return redirect()->route('products.index')
            ->with('forbidden', 'Forbidden to view a product.');

        }
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
        $user = Auth::user();
        if (!$user->can('update', $product)) {
            return redirect()->route('products.index')
            ->with('forbidden', 'Forbidden to update a product.');
        }else{
            return view('products.edit', ['product' => $product]);
        }

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
     * @param  integer  $product_id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $product_id )
    {
        $product = Product::findOrFail($product_id);
        $user = Auth::user();
        if (!$user->can('delete', $product)) {
            return redirect()->route('products.index')
            ->with('forbidden', 'Forbidden to delete a product.');
        }else{
            $product->delete();
            return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully');
        }
    }
}
