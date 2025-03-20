<?php

namespace App\Http\Controllers;

use App\Filters\CategoryFilter;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CategoryFilter $filter)
    {
        $records = Category::latest()->filter($filter)->paginate();

        return view('admin.categories.list', compact('records'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $products = $category->products()->where([
            ['is_hidden', false],
            ['quantity', '>', 0]
        ])->get();

        if ($products->isEmpty()) {
            $products = Product::whereIn('category_id', $category->children->pluck('id'))
                                ->where('is_hidden', false)
                                ->where('quantity', '>', 0)->get();
        }


        return view('category', compact('category', 'products'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $categories = Category::all();
        return view('admin.categories.edit', compact('category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->fill([
            'parent_id' => $request->parent_id,
            'name' => $request->name,
            'slug' => $request->slug ?: Str::slug($request->name)
        ])->save();

        return back()->with('success', __('messages.success.updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if (!$category->delete()) {
            return back()->with('errors', __('messages.errors.delete'));
        }

        return redirect('/admin/categories')->with('success', __('messages.success.deleted'));
    }
}
