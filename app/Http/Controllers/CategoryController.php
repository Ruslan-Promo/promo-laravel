<?php

namespace App\Http\Controllers;

use App\Models\Category;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

use App\Helpers\Promo;

class CategoryController extends Controller
{

    /**
     * Display a listing of the users
     *
     * @param  \App\Models\Category $model
     * @return \Illuminate\View\View
     */
    public function index(Category $model)
    {
        return view('categories.index', ['categories' => $model->paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function create(Category $category)
    {
        return view('categories.create', ['categories' => $category->all()]);
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
            'name' => ['required', 'unique:categories', 'max:255'],
            'slug' => ['unique:categories', 'max:255']
        ]);
        if($request->has('slug')){
            $slug = $request->input('slug');
            if (!preg_match('/[^A-Za-z0-9]/', $slug)){
                $slug = Promo::toLat($slug);
            }
            $request = new Request($request->all());
            $request->merge(['slug' => $slug]);
        }


        Category::create($request->all());

        return redirect()->route('categories.index')
            ->with('success', 'Category created successfully.');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price_year' => 'required',

        ]);
        $category->update($request->all());

        return redirect()->route('categories.index')
            ->with('success', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $cat_id = $category->id;
        $category->delete();

        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully');
    }
}
