<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use MeiliSearch\Endpoints\Indexes;


class SearchController extends Controller
{
    public function search(Request $request, Product $products)
    {
        $products = $products->search($request->get('name'));

        if($request->has('price') && !empty($request->get('price'))){
            $products->where('price_year', $request->get('price'));
        }
        if($request->has('category') && !empty($request->get('category'))){
            $products->where('category', $request->get('category'));
        }
        if($request->has('company') && !empty($request->get('company'))){
            $products->where('company', $request->get('company'));
        }
        $params['products'] = $products->paginate(15);
        return view('frontend.products.search', $params);
    }

}
