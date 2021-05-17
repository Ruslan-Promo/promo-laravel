<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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

    public function productsCategory(Category $category)
    {
        $params['products'] = Product::ByCategory($category->id)->paginate(15);
        return view('frontend.products.category', $params);
    }

    public function productsShow(Category $category, Product $product)
    {
        return view('frontend.products.show', ['product' => $product]);
    }

    public function productsPurchase(Request $request)
    {
        if($request->has('productId') && Auth::check()){
            $product = Product::findOrFail($request->get('productId'));
            $price = $product->price_year;
            $type = __('main.PriceYear');
            if($request->has('type')){
                switch($request->get('type')){
                    case 'one_month':
                        $price = $product->price_one_month;
                        $type = __('main.PriceOneMonth');
                        break;
                    case 'six_month':
                        $price = $product->price_six_month;
                        $type = __('main.PriceSixMonth');
                        break;
                    case 'six_month':
                        $price = $product->price_year;
                        $type = __('main.PriceYear');
                        break;
                }
            }
            $price = $price * 100;
            $payment = Auth::user()->charge($price, $request->get('paymentId'), [
                'amount' => $price,
                'currency' => 'usd',
                'receipt_email' => $request->user()->email,
                'description' => $product->name.' ('.$type.')',
            ]);
            return view('frontend.products.show', ['product' => $product, 'status' => 'success']);
        }

    }
}
