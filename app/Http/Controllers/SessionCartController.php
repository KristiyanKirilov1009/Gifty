<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SessionCartController extends Controller
{
    public function addToCart(Request $request, Product $product)
    {
        $cart = $request->session()->get('cart', []);

        if(isset($cart[$product->id]))
        {
            if($product->quantity < $cart[$product->id]['quantity'] + $request->quantity)
            {
                $request->session()->flash('errors', ['Not enough quantity!']);
                return redirect()->back();
            }
            else
            {
                $cart[$product->id]['quantity']+= $request->quantity;
            }
        }
        else
        {
            $cart[$product->id] = [
                'name' => $product->name,
                'slug' => $product->slug,
                'price' => $product->price,
                'quantity' => $request->quantity,
                'image' => $product->images()->first()->filepath ?? null
            ];
        }

        $request->session()->put('cart', $cart);

        $request->session()->flash('success', __('messages.success.cart.added'));

        return redirect()->back();
    }

    public function show()
    {
        $products = null;

        if(session('cart'))
        {
            $products = Product::whereIn('id', array_keys(session('cart')))->get();
        }

        return view('shopping-cart', compact('products'));
    }

    public function updateCart(Request $request)
    {
        $cart = session('cart');

        foreach($cart as $key => $value)
        {
            $product = Product::find($key);

            if($product->quantity < $request->cart[$key]['quantity'])
            {
                $request->session()->flash('errors', [__('messages.errors.cart.not-enough-quantity', ['product' => $value['name']])]);
                return redirect()->back();
            }
            else
            {
                $cart[$key]['quantity'] = $request->cart[$key]['quantity'];
            }
        }

        $request->session()->flash('success', __('messages.success.cart.updated'));
        $request->session()->put('cart', $cart);

        return redirect()->back();
    }

    public function removeFromCart(Request $request, Product $product)
    {
        $cart = session('cart');
        unset($cart[$product->id]);

        $request->session()->flash('success', __('messages.success.cart.removed'));
        $request->session()->put('cart', $cart);

        if(empty($cart))
        {
            $request->session()->forget('cart');
        }

        return redirect()->back();
    }
}
