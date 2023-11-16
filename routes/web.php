<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserRegister;

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

Route::get('/sign_in', [UserRegister::class,'sign_in'])->name('registerUser.sign_in');
Route::get('/sign_up', [UserRegister::class,'sign_up']);
Route::get('/logout', function(){});
Route::get('/confirm/{token}', [UserRegister::class,'confirm'])->name('registerUser.confirm');
Route::get('/message', [UserRegister::class,'messageCofirm'])->name('registerUser.message');
Route::get('/forget_password',[UserRegister::class,'forget_password'] );
Route::get('/reset/{token}',[UserRegister::class,'reset'])->name('registerUser.reset');

Route::post('/reset/{token}', [UserRegister::class,'resetStore'])->name('registerUser.resetStore');
Route::post('/forget_password', [UserRegister::class,'storeForget'])->name('registerUser.storeForgetPassword');
Route::post('/sign_up', [UserRegister::class,'store'])->name('registerUser.store');
Route::post('/sign_in',[UserRegister::class,'store_sign_in'])->name('registerUser.store_sign_in');