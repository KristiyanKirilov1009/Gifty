<?php

namespace App\Http\Controllers\Admin;

use App\Filters\CategoryFilter;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoryController extends AdminController
{
    public function __construct()
    {
        $this->datatable = ['name', 'slug', 'created_at'];
        $this->module = 'categories';
        $this->filters = true;

        $this->authorizeResource(Category::class, 'category');

        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     */
    public function index(CategoryFilter $filter)
    {
        $records = Category::latest()->filter($filter)->paginate();

        return view('admin.categories.list', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $data = $request->validated();

        $data['slug'] = $request->slug ?: Str::slug($data['name']);

        $category = Category::create($data);


        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $path = $request->file('image')->storePublicly('/images/categories/' . $category->id, 'public');

            $image = new Image([
                'name' => $file->getClientOriginalName(),
                'filename' => $file->hashName(),
                'filepath' => $path,
                'filesize' => $file->getSize()
            ]);

            $category->image()->save($image);
        }

        return redirect('/admin/categories')->with('success', __('admin.success.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('admin.categories.show', compact('category'));
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

        if($request->hasFile('image'))
        {
            $file = $request->file('image');

            if($category->image)
            {
                Storage::delete('public/' . $category->image->filepath);
                $category->image()->delete();
            }

            $path = $request->file('image')->storePublicly('/images/categories/' . $category->id, 'public');

            $image = new Image([
                'name' => $file->getClientOriginalName(),
                'filename' => $file->hashName(),
                'filepath' => $path,
                'filesize' => $file->getSize()
            ]);

            $category->image()->save($image);
        }

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
