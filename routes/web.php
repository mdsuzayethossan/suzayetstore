<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerEmailVerifyController;
use App\Http\Controllers\CustomerForgotpassController;
use App\Http\Controllers\CustomerLoginController;
use App\Http\Controllers\CustomerRegisterController;
use App\Http\Controllers\Footercontroller;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\GithubController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NavigationbarController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleManagementController;
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
    Route::post('/customer/update', 'Customerupdate')->name('customer.update');

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
    Route::get('/profile', 'profile')->name('profile');
    Route::post('/profile/update', 'profile_update')->name('profile.update');

});
//Role Management
Route::controller(RoleManagementController::class)->group(function() {
    Route::get('/role/permission/name', 'role_permission_name')->name('role.permission.name');
    Route::post('/role/permission/name/add', 'role_permission_name_add')->name('role.permission.name.add');
    Route::get('/role/permission/', 'role_permission')->name('role.permission');
    Route::post('/role/add/permission/assign', 'role_permission_assign')->name('role.permission.assign');

});

Route::controller(CategoryController::class)->group(function () {
    Route::get('/category', 'category')->name('category');

});
Route::controller(BannerController::class)->group(function(){
    Route::get('/banner', 'banner')->name('banner');
    Route::post('/banner/post', 'banner_post')->name('banner.post');


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
//password reset
Route::controller(CustomerForgotpassController::class)->group(function() {
    Route::get('/password/forgot', 'PasswordForgot')->name('password.forgot');
    Route::post('/forget/email/send', 'CustomerForgotEmaiil')->name('customer.forgot.email');
    Route::get('/customer/password/reset/form/{reset_token}', 'CustomerResetForm')->name('customer.reset.form');
    Route::post('/customer/password/reset/update', 'CustomerResetUpdate')->name('customer.reset.update');

});


Route::controller(CustomerEmailVerifyController::class)->group(function() {
    Route::get('/customer/email/verified/{verified_token}', 'VerifiedEmail')->name('verified.email');
    Route::get('/verified/welcome', 'verified_welcome')->name('verified.welcome');

});

//social login
Route::get('/redirect/github', [GithubController::class, 'RedirectToProvider'])->name('redirect.to.provider');
Route::get('/github/callback', [GithubController::class, 'CallbackFromGithub'])->name('callback.from.github');
