<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;


class FrontendController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\Product $model
     * @return \Illuminate\View\View
     */
    public function productsIndex(Category $category)
    {
        $params['categories'] = $category->paginate(15);
        return view('frontend.products.index', $params);

    }

    public function productsCategory($category_slug)
    {
        $category = Category::where('slug', '=', $category_slug)->firstOrFail();
        $params['products'] = Product::where('category_id', '=', $category->id)->paginate(15);
        return view('frontend.products.category', $params);
    }

    public function productsShow($category_slug, $product_id)
    {
        $product = Product::findOrFail($product_id);
        return view('frontend.products.show', ['product' => $product]);
    }
}
