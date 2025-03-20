<?php

namespace App\Http\Controllers\Admin;

use App\Filters\ProductFilter;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends AdminController
{
    public function __construct()
    {
        $this->datatable = ['image', 'name', 'price', 'quantity', 'created_at'];
        $this->module = 'products';
        $this->filters = true;

        $this->authorizeResource(Product::class, 'product');

        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     */
    public function index(ProductFilter $filter)
    {
        $records = Product::latest()->filter($filter)->paginate();

        return view('admin.products.list', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $data = $request->validated();
        if (! $request->filled('slug')) {
            $data['slug'] = Str::slug($request->name, null, 'en');
        }

        if (! $request->filled('sku')) {
            $data['sku'] = Str::random(32);
        }

        $product = Product::create($data);


        if ($request->hasFile('images')) {
            $images = [];
            foreach ($request->file('images') as $key => $file) {
                $path = $file->storePublicly('images/products/' . $product->id, 'public');
                $images[] = new Image([
                    'name' => $file->getClientOriginalName(),
                    'filename' => $file->hashName(),
                    'filepath' => $path,
                    'filesize' => $file->getSize(),
                ]);
            }

            $product->images()->saveMany($images);
        }

        return redirect('/admin/products')->with('success', __('messages.success.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::orderBy('name')->get();

        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->slug ?: $request->name);

        $product->fill($data)->save();

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $key => $file) {
                $path = $file->storePublicly('images/products/' . $product->id, 'public');

                $image = $product->images()->where('id', $key)->first();
                if ($image) {
                    Storage::delete($image->filepath);
                } else {
                    $image = $product->images()->create(['name' => 'Image ' . $key]);
                }

                $image->fill([
                    'name' => $file->getClientOriginalName(),
                    'filename' => $file->hashName(),
                    'filepath' => $path,
                    'filesize' => $file->getSize(),
                ])->save();
            }
        }

        return back()->with('success', __('messages.success.updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if (! $product->delete()) {
            return back()->with('errors', __('messages.errors.delete'));
        }

        return back()->with('success', __('messages.success.deleted'));
    }

    public function deleteImage(Product $product, Image $image)
    {
        Storage::delete('public/' . $image->filepath);
        $image->delete();

        return back()->with('success', __('messages.success.deleted'));
    }
}
