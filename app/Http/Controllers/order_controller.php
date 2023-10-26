<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class order_controller extends Controller
{
    protected function index()
    {
        $orders = DB::table('tab_pedido')
            ->join('tab_ponto_venda', 'tab_ponto_venda.pk_ponto_venda', '=', 'tab_pedido.pk_ponto_venda')
            ->orderByDesc('num_pedido')->get();
        $local = 'pedidos';
        $titulo = 'Pedidos';

        return view('pedidos', compact('orders', 'local', 'titulo'));
    }

    protected function abertos($inicio = null, $final = null)
    {

        if ($inicio == null && $final == null) {
            $orders = DB::table('tab_pedido')
                ->join('tab_ponto_venda', 'tab_ponto_venda.pk_ponto_venda', '=', 'tab_pedido.pk_ponto_venda')
                ->where('pk_situacao', '=', '1')
                ->orderByDesc('num_pedido')->get();
        } else {
            $orders = DB::table('tab_pedido')
                ->join('tab_ponto_venda', 'tab_ponto_venda.pk_ponto_venda', '=', 'tab_pedido.pk_ponto_venda')
                ->where('pk_situacao', '=', '1')
                ->whereBetween('dat_fechamento', $inicio, $final)
                ->orderByDesc('num_pedido')->get();
        }

        $local = 'pedidos-abertos';
        $titulo = 'Pedidos abertos';

        return view('pedidos', compact('orders', 'local', 'titulo'));
    }

    protected function fechados($inicio = null, $final = null)
    {

        if ($inicio == null && $final == null) {
            $orders = DB::table('tab_pedido')
                ->join('tab_ponto_venda', 'tab_ponto_venda.pk_ponto_venda', '=', 'tab_pedido.pk_ponto_venda')
                ->where('pk_situacao', '=', '20')
                ->orderByDesc('num_pedido')->get();
        } else {
            $orders = DB::table('tab_pedido')
                ->join('tab_ponto_venda', 'tab_ponto_venda.pk_ponto_venda', '=', 'tab_pedido.pk_ponto_venda')
                ->where('pk_situacao', '=', '20')
                ->whereBetween('dat_fechamento', $inicio, $final)
                ->orderByDesc('num_pedido')->get();
        }

        $local = 'pedidos-fechados';
        $titulo = 'Pedidos fechados';

        return view('pedidos', compact('orders', 'local', 'titulo'));
    }

    protected function faturados($inicio = null, $final = null)
    {

        if ($inicio == null && $final == null) {
            $orders = DB::table('tab_pedido')
                ->join('tab_ponto_venda', 'tab_ponto_venda.pk_ponto_venda', '=', 'tab_pedido.pk_ponto_venda')
                ->where('pk_situacao', '=', '50')
                ->orderByDesc('num_pedido')->get();
        } else {
            $orders = DB::table('tab_pedido')
                ->join('tab_ponto_venda', 'tab_ponto_venda.pk_ponto_venda', '=', 'tab_pedido.pk_ponto_venda')
                ->where('pk_situacao', '=', '50')
                ->whereBetween('dat_fechamento', $inicio, $final)
                ->orderByDesc('num_pedido')->get();
        }

        $local = 'pedidos-faturados';
        $titulo = 'Pedidos faturados';
        return view('pedidos', compact('orders', 'local', 'titulo'));

    }

    protected function lojasProprias($inicio = null, $final = null) {

        if ($inicio == null && $final == null) {
            $orders = DB::table('tab_pedido')
                ->join('tab_ponto_venda', 'tab_ponto_venda.pk_ponto_venda', '=', 'tab_pedido.pk_ponto_venda')
                ->where([['tab_ponto_venda.pk_ponto_venda', '=', '1']])
                ->orderByDesc('num_pedido')->get();
        } else {
            $orders = DB::table('tab_pedido')
                ->join('tab_ponto_venda', 'tab_ponto_venda.pk_ponto_venda', '=', 'tab_pedido.pk_ponto_venda')
                ->where([['tab_ponto_venda.pk_ponto_venda', '=', '1']])
                ->whereBetween('dat_fechamento', $inicio, $final)
                ->orderByDesc('num_pedido')->get();
        }

        $local = 'pedidos-lojas-proprias';
        $titulo = 'Pedidos lojas próprias';

        return view('pedidos', compact('orders', 'local', 'titulo'));

    }

    protected function somaClientes($inicio = null, $final = null) {

        if ($inicio == null && $final == null) {

            $orders = DB::select("SELECT left(txt_pedido_tipo, 1) AS tipo,
                    txt_nome_ponto_venda as loja,
                    count(*) AS pedidos,
                    concat('R$ ',round(sum(num_2_valor_produtos), 2)) AS valor,
                    concat('R$ ',round(sum(num_2_valor_desconto), 2)) AS valor_final
                    FROM view_rel_pedidos_fechados
                    where dat_fechamento_ymd between '2023-10-25' and '2023-10-25'
                    group by txt_nome_ponto_venda
                    ORDER BY sum(num_2_valor_produtos) DESC");

        } else {
            return redirect()->route('inicio');
        }

        $local = 'soma-clientes';
        $titulo = 'Soma pedidos por cliente';

        return view('pedidos', compact('orders', 'local', 'titulo'));
    }
}
