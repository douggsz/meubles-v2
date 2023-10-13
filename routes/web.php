<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/pedidos', function () {
    $local = 'pedidos';
    return view('pedidos', compact('local'));
})->name('pedidos');

Route::get('/pontos-venda', function () {
    $local = 'pontos';
    return view('pontos', compact('local'));
})->name('pontos');

Route::get('/', function () {

    $sql = "SELECT count(pk_pedido) as numero, pk_situacao as situacao
            FROM tab_pedido
            group by situacao";

    $resource = DB::raw($sql);
    $string = $resource->getValue(DB::connection()->getQueryGrammar());
    $dumps = DB::select($string);

    $sql = "SELECT count(pk_pedido) as numero
            FROM tab_pedido
            where pk_pedido_tipo = 2
            and pk_situacao <> 100";

    $resource = DB::raw($sql);
    $string = $resource->getValue(DB::connection()->getQueryGrammar());
    $assistencias = DB::select($string);

    $local = 'inicio';

    return view('home', compact('dumps','assistencias', 'local'));
})->name('inicio');

Route::get('/clientes', function () {
    $local = 'clientes';
    return view('clientes', compact('local'));
})->name('clientes');
