<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('admin.login');
});

Route::post('action-login', [LoginController::class, 'actionLogin'])->name('login.action');

Route::get('/dashboard-admin', function () {
    return view('admin.app');
});