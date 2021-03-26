<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Hash;

class ProductController extends Controller
{

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

}
