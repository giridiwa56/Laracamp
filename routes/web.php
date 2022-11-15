<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\HomeController;

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
    
    //User Dashboard
    Route::get('dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('dashboard/checkout/invoice/{checkout}',[CheckoutController::class, 'invoice'])->name('user.checkout.invoice');
});
require __DIR__.'/auth.php';
