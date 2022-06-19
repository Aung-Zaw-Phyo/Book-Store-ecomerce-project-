<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SubscriberController;
use App\Models\Subscriber;
use GuzzleHttp\Psr7\Message;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', [BookController::class, 'home']);
Route::get('/home', [BookController::class, 'home']);
Route::get('/shop', [BookController::class, 'index']);
Route::get('/about', [BookController::class, 'about']);
Route::get('/contact', [BookController::class, 'contact']);
Route::get('/order', [OrderController::class, 'order'])->middleware('be_auth');
Route::get('/cart', [CartController::class, 'cart'])->middleware('be_auth');
Route::get('/checkout', [CartController::class, 'checkout'])->middleware('be_auth');
Route::post('/checkout', [CartController::class, 'store'])->middleware('be_auth');



// cart 
Route::post('/cart/add/{id}', [CartController::class, 'create'])->middleware('be_auth');
Route::post('/cart/cancel/{id}', [CartController::class, 'delete'])->middleware('be_auth');
Route::post('/carts/cancel', [CartController::class, 'deleteAll'])->middleware('be_auth');

// authentication 
Route::get('/register', [AuthController::class, 'create'])->middleware('guest');
Route::post('/register', [AuthController::class, 'store'])->middleware('guest');
Route::get('/login', [AuthController::class, 'login'])->middleware('guest');
Route::post('/login', [AuthController::class, 'post_login'])->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('be_auth');

// subscription 
Route::post('/subscribe', [SubscriberController::class, 'subscribeHandler'])->middleware('be_auth');

// review 
Route::post('/review/add', [ReviewController::class, 'create'])->middleware('be_auth');
Route::post('/review/delete/{id}',[ReviewController::class, 'destroy'])->middleware('be_auth');
Route::get('//books/oredered-list/{id}', [ReviewController::class, 'view_list']);

// Message 
Route::post('/message/add', [MessageController::class, 'create']);


// admin dashboard 

Route::get('/admin', [AdminController::class, 'index']);
Route::get('/admin/products', [AdminController::class, 'index']);
Route::get('/admin/cart/edit/{book}', [AdminController::class, 'cart_edit']);
Route::patch('/admin/product/update/{book}', [AdminController::class, 'cart_update']);
Route::delete('/admin/cart/delete/{id}', [AdminController::class, 'cart_destroy']);

Route::get('/admin/products/add', [AdminController::class, 'book_create']);
Route::post('/admin/product/add', [AdminController::class, 'product_store']);

// category 
Route::get('/admin/categories', [AdminController::class, 'categories']);
Route::get('/admin/category/edit/{category}', [AdminController::class, 'category_edit']);
Route::patch('/admin/category/update/{category}', [AdminController::class, 'category_update']);
Route::delete('/admin/category/delete/{id}', [AdminController::class, 'category_destroy']);
Route::get('/admin/categories/add', [AdminController::class, 'category_create']);
Route::post('/admin/categories/add', [AdminController::class, 'category_store']);

// order 
Route::get('/admin/orders/pend', [AdminController::class, 'pending_order']);
Route::delete('/admin/pending_order/delete/{id}', [AdminController::class, 'pending_order_destroy']);
Route::post('/admin/order/update/{id}', [AdminController::class, 'order_update']);

Route::get('/admin/orders/complete', [AdminController::class, 'completed_order']);
Route::delete('/admin/completed_order_delete/{id}', [AdminController::class, 'completed_order_destroy']);

Route::get('/admin/income', [AdminController::class, 'income']);

// users 
Route::get('/admin/users', [AdminController::class, 'users']);
Route::delete('/admin/user/delete/{id}', [AdminController::class, 'user_destroy']);

Route::get('/admin/subscribers', [AdminController::class, 'subscribers']);

// messages and reviews 
Route::get('/admin/messages', [AdminController::class, 'messages']);
Route::delete('/admin/message/delete/{id}', [AdminController::class, 'message_destroy']);

Route::get('/admin/reviews', [AdminController::class, 'reviews']);
Route::delete('/admin/review/delete/{id}', [AdminController::class, 'review_destroy']);

// for real-admin 
Route::get('/admin/real_admin', [AdminController::class, 'real_admin'])->middleware('real_admin');
Route::get('/admin/posts/{id}', [AdminController::class, 'posts'])->middleware('real_admin');
Route::post('/admin/search', [AdminController::class, 'search'])->middleware('real_admin');
Route::post('/admin/permit/{id}', [AdminController::class, 'permit'])->middleware('real_admin');
Route::delete('/admin/delete/{id}', [AdminController::class, 'admin_destroy'])->middleware('real_admin');




