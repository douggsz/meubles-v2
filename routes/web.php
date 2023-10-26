<?php

use App\Http\Controllers\client_controller;
use App\Http\Controllers\delivery_controller;
use App\Http\Controllers\order_controller;
use App\Http\Controllers\pages_controller;
use App\Http\Controllers\store_controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;


Route::get('/', [pages_controller::class,'inicio'])->name('inicio');


Route::get('/pedidos', [order_controller::class, 'index'])->name('pedidos');
Route::get('/pedidos-abertos/{inicio?}/{final?}', [order_controller::class, 'abertos'])->name('pedidos-abertos');
Route::get('/pedidos-fechados/{inicio?}/{final?}', [order_controller::class, 'fechados'])->name('pedidos-fechados');
Route::get('/pedidos-faturados/{inicio?}/{final?}', [order_controller::class, 'faturados'])->name('pedidos-faturados');
Route::get('/pedidos-lojas-proprias/{inicio?}/{final?}', [order_controller::class, 'lojasProprias'])->name('pedidos-lojas-proprias');
Route::get('/soma-clientes/{inicio?}/{final?}', [order_controller::class, 'somaClientes'])->name('soma-clientes');


Route::get('/entrega', [delivery_controller::class,'index'])->name('entrega');

Route::get('/clientes', [client_controller::class,'index'])->name('clientes');

Route::get('/pontos-venda', [store_controller::class,'index'])->name('pontos');

