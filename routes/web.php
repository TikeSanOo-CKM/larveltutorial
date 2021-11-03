<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
// Route::middleware('web')->domain(env('APP_LINK'))->group(function () {
  
// });
Route::group(['middleware' => ['auth']], function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::delete('/customer/{customer}', [App\Http\Controllers\TestController::class, 'delete_customer'])->name('customer.delete');

});

Route::get('/add', [App\Http\Controllers\TestController::class, 'add_customer_form'])->name('customer.add');
Route::post('/save', [App\Http\Controllers\TestController::class, 'submit_customer_data'])->name('customer.save');
Route::get('/list', [App\Http\Controllers\TestController::class, 'fetch_all_customer'])->name('customer.list');
Route::get('/customer/edit/{customer}', [App\Http\Controllers\TestController::class, 'edit_customer_form'])->name('customer.edit');
Route::patch('/customer/edit/{customer}', [App\Http\Controllers\TestController::class, 'edit_customer_form_submit'])->name('customer.update');
Route::get('/customer/{customer}', [App\Http\Controllers\TestController::class, 'view_single_customer'])->name('customer.view');




