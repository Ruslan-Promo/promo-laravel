<?php

namespace App\Http\Controllers;

use App\Models\Category;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;

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
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CategoryStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryStoreRequest $request)
    {
        if($request->has('slug')){
            $slug = $request->input('slug');
            $slug = Str::slug($slug, '-');
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
        return view('categories.show', ['category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('categories.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\CategoryUpdateRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdateRequest $request, Category $category)
    {
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
        $category->delete();

        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully');
    }
}
