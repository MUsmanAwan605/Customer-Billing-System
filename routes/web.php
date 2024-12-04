<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\user\UserController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\BillingController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\CustomerController;

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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware('auth','role:admin')->group(function () {
    Route::get('/admin/dashboard',[AdminController::class,'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout',[AdminController::class,'Adminlogout'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
    Route::post('/admin/password/update', [AdminController::class, 'AdminPasswordUpdate'])->name('admin.password.update');


     // Product
    //  Route::get('/admin/product',[ProductController::class,'index'])->name('admin.product.index');
    //  Route::get('/admin/product/create',[ProductController::class,'create'])->name('admin.product.create');
    //  Route::post('/admin/product',[ProductController::class,'store'])->name('admin.product.store');
    // //  Route::get('/admin/product/{id}',[ProductController::class,'show'])->name('admin.product.show');
    //  Route::get('/admin/product/{id}/edit',[ProductController::class,'edit'])->name('admin.product.edit');
    //  Route::put('/admin/product/{id}',[ProductController::class,'update'])->name('admin.product.update');
    //  Route::delete('/admin/product/{id}',[ProductController::class,'destroy'])->name('admin.product.destroy');
    // // Route::get('/admin/product/search_data',[ProductController::class,'search'])->name('admin.product.search');


     // Billing
     Route::get('/admin/billing',[BillingController::class,'index'])->name('admin.billing.index');
     Route::get('/admin/billing/create',[BillingController::class,'create'])->name('admin.billing.create');
     Route::post('/admin/billing',[BillingController::class,'store'])->name('admin.billing.store');
     Route::get('/admin/billing/{id}',[BillingController::class,'show'])->name('admin.billing.show');
     Route::get('/admin/billing/{id}/edit',[BillingController::class,'edit'])->name('admin.billing.edit');
     Route::put('/admin/billing/{id}',[BillingController::class,'update'])->name('admin.billing.update');
     Route::delete('/admin/billing/{id}',[BillingController::class,'destroy'])->name('admin.billing.destroy');
    Route::get('/billing/search_data',[BillingController::class,'search_data'])->name('billing.search');

    //  customer
    Route::get('/admin/customer',[CustomerController::class,'index'])->name('admin.customer.index');
    Route::get('/admin/customer/create',[CustomerController::class,'create'])->name('admin.customer.create');
    Route::post('/admin/customer',[CustomerController::class,'store'])->name('admin.customer.store');
    // Route::get('/admin/customer/{id}',[CustomerController::class,'show'])->name('admin.customer.show');
    Route::get('/admin/customer/{id}/edit',[CustomerController::class,'edit'])->name('admin.customer.edit');
    Route::put('/admin/customer/{id}',[CustomerController::class,'update'])->name('admin.customer.update');
    Route::delete('/admin/customer/{id}',[CustomerController::class,'destroy'])->name('admin.customer.destroy');
    Route::get('/admin/customer/search_data',[CustomerController::class,'search'])->name('admin.customer.search');

});
Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');


Route::middleware('auth','role:user')->group(function () {
    Route::get('/user/dashboard',[UserController::class,'UserDashboard'])->name('user.dashboard');
    Route::get('/user/logout',[UserController::class,'Userlogout'])->name('user.logout');
});
