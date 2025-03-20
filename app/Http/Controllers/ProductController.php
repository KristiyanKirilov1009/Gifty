<?php

namespace App\Http\Controllers;

use App\Filters\ProductFilter;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ProductFilter $filter)
    {
        $products = Product::latest()->filter($filter)->paginate(10);

        return view('products', compact('products'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('single-product', compact('product'));
    }
}
