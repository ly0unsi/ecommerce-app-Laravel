<?php


use TCG\Voyager\Facades\Voyager;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\cardController;
use App\Http\Controllers\frontController;
use App\Http\Controllers\PaymentController;

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

Route::get('/',[frontController::class,'index'])->name('/');
Route::get('product/{slug}',[frontController::class,'viewProduct']);
Route::get('search',[frontController::class,'search']);
Route::group(['middleware'=>['auth']],function(){
Route::get('mycard',[cardController::class,'index']);
Route::post('card/store',[cardController::class,'store'])->name('card.store');
Route::patch('update/{rowId}',[cardController::class,'update'])->name('card.update');
Route::delete('delete/{rowId}',[cardController::class,'destroy']);

Route::get('payment',[PaymentController::class,'index']);
Route::post('checkout',[PaymentController::class,'store']);
Route::get('merci',[PaymentController::class,'merci']);

});
Route::get('post/{slug}',[frontController::class,'viewPost']);





Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
