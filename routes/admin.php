<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/login', function () {
    return view('admin.auth.login');
})->name('admin.login');
Route::post('/login', [LoginController::class, 'login']);


Route::middleware(['admin'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::post('/logout', [LoginController::class, 'logout'])->name('admin.logout');
    // Route::get('/settings', function () {
    //     return view('admin.profile');
    // });

    // UserController
    Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('admin.users.create');
    Route::post('/users', [UserController::class, 'store'])->name('admin.users.store');
    Route::get('/users/{user}/show', [UserController::class, 'show'])->name('admin.users.show');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('/users/{user}/destroy', [UserController::class, 'destroy'])->name('admin.users.destroy');
    Route::post('/users/{user}/toggleRoles', [UserController::class, 'toggleRoles'])->name('admin.users.toggleRoles');

    // RoleController
    Route::get('/roles', [RoleController::class, 'index'])->name('admin.roles.index');
    Route::get('/roles/create', [RoleController::class, 'create'])->name('admin.roles.create');
    Route::post('/roles', [RoleController::class, 'store'])->name('admin.roles.store');
    Route::get('/roles/{role}/show', [RoleController::class, 'show'])->name('admin.roles.show');
    Route::get('/roles/{role}/edit', [RoleController::class, 'edit'])->name('admin.roles.edit');
    Route::put('/roles/{role}', [RoleController::class, 'update'])->name('admin.roles.update');
    Route::delete('/roles/{role}/destroy', [RoleController::class, 'destroy'])->name('admin.roles.destroy');

    // CategoryController
    Route::get('/categories', [CategoryController::class, 'index'])->name('admin.categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('admin.categories.store');
    Route::get('/categories/{category}/show', [CategoryController::class, 'show'])->name('admin.categories.show');
    Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
    Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('admin.categories.update');
    Route::delete('/categories/{category}/destroy', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');

    // ProductController
    Route::get('/products', [ProductController::class, 'index'])->name('admin.products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('admin.products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('admin.products.store');
    Route::get('/products/{product}/show', [ProductController::class, 'show'])->name('admin.products.show');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
    Route::post('/products/{product}', [ProductController::class, 'update'])->name('admin.products.update');
    Route::delete('/products/{product}/destroy', [ProductController::class, 'destroy'])->name('admin.products.destroy');
    Route::post('/products/{product}/images/{image}/deleteImage', [ProductController::class, 'deleteImage'])->name('admin.products.deleteImage');

    // OrderController
    Route::get('/orders', [OrderController::class, 'index'])->name('admin.orders.index');
    // Route::get('/orders/create', [OrderController::class, 'create'])->name('admin.orders.create');
    // Route::post('/orders', [OrderController::class, 'store'])->name('admin.orders.store');
    Route::get('/orders/{order}/show', [OrderController::class, 'show'])->name('admin.orders.show');
    // Route::get('/orders/{order}/edit', [OrderController::class, 'edit'])->name('admin.orders.edit');
    Route::post('/orders/{order}', [OrderController::class, 'update'])->name('admin.orders.update');
    // Route::delete('/orders/{order}/destroy', [OrderController::class, 'destroy'])->name('admin.orders.destroy');

    // BlogController
    Route::get('/blogs', [BlogController::class, 'index'])->name('admin.blogs.index');
    Route::get('/blogs/create', [BlogController::class, 'create'])->name('admin.blogs.create');
    Route::get('/blogs/{blog}/show', [BlogController::class, 'show'])->name('admin.blogs.show');
    Route::post('/blogs', [BlogController::class, 'store'])->name('admin.blogs.store');
    Route::get('/blogs/{blog}/edit', [BlogController::class, 'edit'])->name('admin.blogs.edit');
    Route::put('/blogs/{blog}', [BlogController::class, 'update'])->name('admin.blogs.update');
    Route::delete('/blogs/{blog}/destroy', [BlogController::class, 'destroy'])->name('admin.blogs.destroy');

    Route::get('/blog', function () {
        return view('profile');
    });

    Route::get('/reviews', function () {
        return view('profile');
    });
});
