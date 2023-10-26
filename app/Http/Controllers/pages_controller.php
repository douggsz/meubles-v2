<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class pages_controller extends Controller
{
    protected function inicio(){
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

        return view('home', compact('dumps', 'assistencias', 'local'));
    }
}
