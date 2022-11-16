<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\DashboardController as UserDashboard;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;

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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

//Backup Routes
// Route::get('checkout/{camp:slug}', function () {
// return view('checkout');
// })->name('checkout');

//Backup Routes
// Route::get('checkout/{camp:slug}',[CheckoutController::class, 'create'])->name('checkout');



// Route::get('success_checkout', function () {
//     return view('success_checkout');
// })->name('success_checkout');


//socialite Routes
Route::get('sign-in-google', [UserController::class, 'google'])->name('user.login.google');
Route::get('auth/google/callback', [UserController::class, 'handleProviderCallback'])->name('auth.google.callback');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function (){
    //checkout routes
    Route::get('checkout/success',[CheckoutController::class, 'success'])->name('checkout.success');
    Route::get('checkout/{camp:slug}',[CheckoutController::class, 'create'])->name('checkout.create');
    Route::post('checkout/{camp}',[CheckoutController::class, 'store'])->name('checkout.store');
    
    // Home Dashboard
    Route::get('dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    // User Dashboard
    Route::prefix('user/dashboard')->namespace('User')->name('user.')->group(function(){
        Route::get('/', [UserDashboard::class, 'index'])->name('dashboard');
    });


    //Admin Dashboard
    Route::prefix('admin/dashboard')->namespace('admin.')->group(function(){
        Route::get('/', [AdminDashboard::class, 'index'])->name('dashboard');
    });

});
require __DIR__.'/auth.php';
