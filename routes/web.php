<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\registerController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\menuController;
use App\Http\Controllers\transferenciaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('welcome');
})->name('login');

Route::get('/pagamentos', [menuController::class, 'pagamentos'])->name('pagamentos');
Route::get('/transferencia', [menuController::class, 'transferencia'])->name('transferencia');
Route::get('/extrato', [menuController::class, 'extrato'])->name('extrato');
Route::get('/home', [menuController::class, 'dashboard'])->name('home');
Route::post('/logout', [loginController::class, 'logout'])->name('logout');
Route::post('/register', [registerController::class, 'register'])->name('register');
Route::post('/login', [loginController::class, 'login'])->name('login');
Route::post('/transferir', [transferenciaController::class, 'transferir'])->name('transferir');
Route::post('/pagar', [transferenciaController::class, 'pagar'])->name('pagar');
