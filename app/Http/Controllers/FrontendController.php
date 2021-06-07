<?php

namespace App\Http\Controllers;

use App\Contracts\PromoPdfServiceInterface;
use App\Events\ProductPaid;
use App\Jobs\PolicyGenerateJob;
use App\Jobs\SendAgentMailJob;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\ProductRequest;
use App\Models\User;
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

            $product_request = ProductRequest::create([
                'product_id' => $product->id,
                'user_id' => Auth::user()->id,
                'date_created' => date('Y-m-d')
            ]);

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
                    case 'year':
                        $price = $product->price_year;
                        $type = __('main.PriceYear');
                        break;
                }
            }
            $price_convert = $price * 100;
            $payment = Auth::user()->charge($price_convert, $request->get('paymentId'), [
                'amount' => $price_convert,
                'currency' => 'usd',
                'receipt_email' => $request->user()->email,
                'description' => $product->name.' ('.$type.')',
            ]);

            $order = Order::create([
                'customer_id' => $product_request->user_id,
                'agent_id' => $product->agent_id,
                'request_id' => $product_request->id,
                'total' => $price,
                'date_registration' => date('Y-m-d'),
                'date_payment' => date('Y-m-d')
            ]);
            event(new ProductPaid($order));
            PolicyGenerateJob::dispatch($order);
            return view('frontend.products.show', ['product' => $product, 'status' => 'success']);
        }

    }

    public function productsContactMe(Request $request)
    {
        if($request->has('productId')){
            $product = Product::findOrFail($request->get('productId'));
            $user = Auth::user();
            SendAgentMailJob::dispatch($user, $product)->onConnection('rabbitmq')->onQueue('emails');
        }
        return back();
    }
}
