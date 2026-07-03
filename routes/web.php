<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TransactionController;

use App\Http\Controllers\Seller\SellerController;
use App\Http\Controllers\Seller\ProductController;
use App\Http\Controllers\Seller\OrderController;

use App\Http\Controllers\Buyer\BuyerController;
use App\Http\Controllers\Buyer\CartController;

/*
|--------------------------------------------------------------------------
| Landing Page
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Route::view('/register-choice', 'auth.register-choice')
    ->name('register.choice');

/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/', [AdminController::class, 'index'])
            ->name('dashboard');

        Route::resource('categories', CategoryController::class);

        Route::get('/transactions', [TransactionController::class, 'index'])
            ->name('transactions.index');

    });

/*
|--------------------------------------------------------------------------
| Seller
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:seller'])
    ->prefix('seller')
    ->name('seller.')
    ->group(function () {

        Route::get('/', [SellerController::class, 'index'])
            ->name('dashboard');

        Route::resource('products', ProductController::class);

        Route::get('/orders', [OrderController::class, 'index'])
            ->name('orders');

        Route::patch('/orders/{order}', [OrderController::class, 'update'])
            ->name('orders.update');

        Route::get('/profile', [SellerController::class, 'profile'])
            ->name('profile');

    });

/*
|--------------------------------------------------------------------------
| Buyer
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:buyer'])
    ->prefix('buyer')
    ->name('buyer.')
    ->group(function () {

        Route::get('/', [BuyerController::class, 'index'])
            ->name('dashboard');

        Route::get('/marketplace', [BuyerController::class, 'marketplace'])
            ->name('marketplace');

        Route::get('/product/{product}', [BuyerController::class, 'show'])
            ->name('product.show');

        Route::get('/cart', [CartController::class, 'index'])
            ->name('cart');

        Route::post('/cart/{product}', [CartController::class, 'add'])
            ->name('cart.add');

        Route::post('/checkout', [CartController::class, 'checkout'])
            ->name('checkout');

        Route::get('/orders', [CartController::class, 'orders'])
            ->name('orders');

        Route::get('/checkout',[CartController::class,'checkoutForm'])
    ->name('checkout.form');

Route::post('/checkout',[CartController::class,'checkout'])
    ->name('checkout');

        Route::get('/profile', [CartController::class, 'profile'])
            ->name('profile');

    });

/*
|--------------------------------------------------------------------------
| Laravel Breeze Profile
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

});

require __DIR__.'/auth.php';