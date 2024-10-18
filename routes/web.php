<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/',[AuthController::class, 'login'])->name('login');
Route::post('/login check',[AuthController::class, 'login_check'])->name('login_check');
Route::get('mailcheck/{token}',[AuthController::class, 'mail_check'])->name('mail_check');
Route::get('/forgot',[AuthController::class, 'forgot'])->name('forgot');
Route::post('/forgot_check',[AuthController::class, 'forgot_check'])->name('forgot_check');
Route::get('password/reset/{token}',[AuthController::class, 'reset'])->name('reset');
Route::post('password/reset/{token}',[AuthController::class, 'reset_password'])->name('reset_password');
Route::get('/logout',[AuthController::class, 'logout'])->name('logout');
Route::group(['middleware' => 'admin'], function(){
    Route::get('/dashboard', function(){
        return view('dashboard');
    });
});

