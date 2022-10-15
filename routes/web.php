<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

// Route::get('/payment', 'App\Http\Controllers\PaymentController')->name('payment');
Route::post('/charge', 'PaymentController@charge')->name('charge');
Route::get('/paymentsuccess', 'PaymentController@payment_success')->name('paymentsuccess');
Route::get('/paymenterror', 'PaymentController@payment_error')->name('paymenterror');

Route::get('payment', [PaymentController::class, 'payment']);
