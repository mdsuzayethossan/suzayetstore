<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerLoginController;
use App\Http\Controllers\CustomerRegisterController;
use App\Http\Controllers\Footercontroller;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NavigationbarController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubcategoryController;
use App\Models\product;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('index');
// });


Auth::routes();
Auth::routes(['verify' => true]);
Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/', [FrontendController::class, 'index'])->name('home');
});
Route::controller(NavigationbarController::class)->group( function() {
    Route::get('/navigationbar', 'navigationbar')->name('navigationbar');
    Route::get('/submenu', 'submenu')->name('submenu');
});
Route::controller(FrontendController::class)->group(function() {
    Route::get('/', 'index')->name('index');
    Route::get('/customer/signin', 'signin')->name('signin');
    Route::get('/customer/account', 'CustomerAccount')->name('customer.accaount');

});
Route::controller(CustomerRegisterController::class)->group(function() {
    Route::post('/customer/register/post', 'customer_register')->name('customer.register');

});
Route::controller(CustomerLoginController::class)->group(function() {

    Route::get('/customer/signout', 'customer_signout')->name('customer_signout');
    Route::post('/customer/signin/post', 'post_signin')->name('post.signin');
});

Route::controller(HomeController::class)->group(function(){
    // Route::get('/home', 'home')->name('home');
    Route::get('/employees', 'employees')->name('employees');
    Route::get('/admin', 'admin')->name('admin');

});

Route::controller(CategoryController::class)->group(function () {
    Route::get('/category', 'category')->name('category');

});
Route::controller(BannerController::class)->group(function(){
    Route::get('/banner', 'banner')->name('banner');


});
Route::controller(ProductController::class)->group(function () {
    Route::get('/product', 'product')->name('product');

});
Route::controller(Footercontroller::class)->group(function () {
    Route::get('/footer', 'footer')->name('footer');

});
Route::controller(SubcategoryController::class)->group( function() {
    Route::get('/subcategory', 'subcategory')->name('subcategory');

});


Route::controller(OrderController::class)->group(function() {
    Route::get('/vieworder', 'vieworder')->name('vieworder');


});
