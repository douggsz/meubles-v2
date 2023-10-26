<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class delivery_controller extends Controller
{
    protected function index()
    {
        $orders = DB::select("SELECT pk_carregamento as 'id',
                                txt_descricao as 'carga',
                                dat_carregamento as 'data',
                                int_pedidos as 'pedidos'
                                from tab_carregamento
                                ORDER BY pk_carregamento DESC");

        $local = 'entrega';
        $titulo = 'Entrega';
        return view('pedidos', compact('orders', 'local', 'titulo'));

    }
}
