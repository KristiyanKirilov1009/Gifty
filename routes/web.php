<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SessionCartController;
use App\Http\Controllers\TermsController;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Cashier\Checkout;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('/about', AboutController::class)->name('about');
Route::get('/categories/{category:slug}', [CategoryController::class, 'show'])->name('categories');
Route::get('/products/{product:slug}', [ProductController::class, 'show'])->name('single-product');

Route::post('/products/{product}/addToCart', [SessionCartController::class, 'addToCart'])->name('addToCart');
Route::delete('/products/{product}/removeFromCart', [SessionCartController::class, 'removeFromCart'])->name('removeFromCart');

Route::put('/updateCart', [SessionCartController::class, 'updateCart'])->name('updateCart');
Route::get('/shopping-cart', [SessionCartController::class, 'show'])->name('shopping-cart');

Route::get('/register', function(){
    return view('register');
})->name('register');

Route::get('/checkout', CheckoutController::class)->name('checkout');
Route::post('/order', [OrderController::class, 'store'])->name('order');

Route::get('/journal', [BlogController::class, 'index'])->name('journal');
Route::get('/journal/{blog:slug}', [BlogController::class, 'show'])->name('journal.show');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

Route::get('/terms', [TermsController::class, 'index'])->name('terms');

Route::get('/test', function(){
    $cart = session('cart');
    $product = Product::where('id', 8)->first()->quantity;
    dd($product);
});

Route::get('/privacy', function () {
    return view('privacy');
})->name('privacy');

Route::get('/sitemap', function() {
    return view('sitemap');
})->name('sitemap');
