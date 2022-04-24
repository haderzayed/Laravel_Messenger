<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\ConversationsController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\MessengerController;
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


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get( '/{id?}',[MessengerController ::class,'index'])->middleware('auth')->name('messenger');

Route::middleware('auth')->group(function (){

    Route::post('account-update',[AccountController::class,'update'])->name('account.update');
    Route::post('change-password',[AccountController::class,'changePassword'])->name('change.password');
});
