<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\EBookController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\OrderController;
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
Route::get('/lang/{locale}', [LanguageController::class, 'setLocale']);

Route::get('/', [AccountController::class, 'view']);
Route::get('/index', [AccountController::class, 'viewIndex'])->middleware('guest');
Route::get('/signup', [AccountController::class, 'viewSignUp'])->middleware('guest');
Route::post('/signup', [AccountController::class, 'signUp']);
Route::get('/login', [AccountController::class, 'viewLogin'])->middleware('guest');
Route::post('/login', [AccountController::class, 'login']);
Route::get('/logout', [AccountController::class, 'logout'])->middleware('authenticated');;

Route::get('/home', [EBookController::class, 'viewHome'])->middleware('authenticated');
Route::get('/home/ebook/{ebookId}', [EBookController::class, 'viewEBook'])->middleware('authenticated');
Route::post('/home/ebook/{ebookId}', [OrderController::class, 'rentToCart']);
Route::get('/cart', [OrderController::class, 'viewCart'])->middleware('authenticated');
Route::put('/cart/checkout', [OrderController::class, 'checkout']);
Route::get('/cart/checkout/success', [OrderController::class, 'viewCheckoutSuccess'])->middleware('authenticated');
Route::delete('/cart/delete/{orderId}', [OrderController::class, 'deleteFromCart']);
Route::get('/profile', [AccountController::class, 'viewProfile'])->middleware('authenticated');
Route::put('/profile/update', [AccountController::class, 'updateProfile']);
Route::get('/profile/update/success', [AccountController::class, 'viewUpdateProfileSuccess'])->middleware('authenticated');

Route::get('/accmaintenance', [AccountController::class, 'viewAccountMaintenance'])->middleware('admin');
Route::get('/accmaintenance/updaterole/{accountId}', [AccountController::class, 'viewUpdateRole'])->middleware('admin');
Route::put('/accmaintenance/updaterole/{accountId}', [AccountController::class, 'updateRole']);
Route::put('/accmaintenance/delete/{accountId}', [AccountController::class, 'deleteAccount']);
