<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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

Route::get('/login', function () {
    return view('login');
});
Route::get('/logout',function ()
{
    if(Session ::has('user')){
        Session::forget('user');
    }
    return redirect('/login');
});
Route::get('/register',[UserController::class,'register']);
Route::post('/register',[UserController::class,'postregister']);
Route::post('/login',[UserController::class,'login']);
Route::get('/',[ProductController::class,'index']);
Route::get('/detail/{id}',[ProductController::class,'details']);
Route::get('/search',[ProductController::class,'search']);
Route::post('/add-to-cart',[ProductController::class,'AddToCart']);
Route::get('/cart-list',[ProductController::class,'getCartList']);
Route::get('/remove-from-cart/{id}',[ProductController::class, 'Remove_from_cart']);
Route::get('/ordernow',[ProductController::class,'OrderNow']);
Route::post('/place-order',[ProductController::class,'PlaceOrder']);
Route::get('/order-list',[ProductController::class,'getOrderList']);