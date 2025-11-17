<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('admin.login');
})->name('login');

Route::post('action-login', [LoginController::class, 'actionLogin'])->name('login.action');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/dashboard-admin', function () {
    return view('admin.administrator.index');
})->middleware(['auth', 'administrator']);

Route::get('/dashboard-operator', function () {
    return view('admin.operator.index');
})->middleware(['auth', 'operator']);
