<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('lojas', function () {

    $sql = "SELECT txt_nome_ponto_venda as ponto, concat(txt_endereco,' - ',txt_bairro,' - ',txt_cidade,', ',txt_uf) as endereco
            FROM bartzpedidosph.tab_ponto_venda
            join tab_cidade on tab_cidade.pk_cidade = tab_ponto_venda.pk_cidade
            where bit_ativo = 1
            ORDER BY pk_ponto_venda ASC";

    $resource = DB::raw($sql);

    $string = $resource->getValue(DB::connection()->getQueryGrammar());

    $dump = DB::select($string);

    return json_encode($dump);

})->name('api_lojas');

Route::prefix('pedidos/new/')->group(function () {
    Route::get('uptime-infos-fechados/', function () {

        $sql = "SELECT count(pk_pedido) as numero
            FROM tab_pedido
            where pk_situacao = 20";
        $resource = DB::raw($sql);
        $string = $resource->getValue(DB::connection()->getQueryGrammar());
        $pedidos = DB::select($string);

        return json_encode($pedidos);

    })->name('api-fechados');
    Route::get('uptime-infos-analisados/', function () {

        $sql = "SELECT count(pk_pedido) as numero
            FROM tab_pedido
            where pk_situacao = 30";
        $resource = DB::raw($sql);
        $string = $resource->getValue(DB::connection()->getQueryGrammar());
        $pedidos = DB::select($string);

        return json_encode($pedidos);

    })->name('api-analisados');;
    Route::get('uptime-infos-lancados/', function () {

        $sql = "SELECT count(pk_pedido) as numero
            FROM tab_pedido
            where pk_situacao = 40";
        $resource = DB::raw($sql);
        $string = $resource->getValue(DB::connection()->getQueryGrammar());
        $pedidos = DB::select($string);

        return json_encode($pedidos);

    })->name('api-lancados');
    Route::get('uptime-infos-faturados/', function () {

        $sql = "SELECT count(pk_pedido) as numero
            FROM tab_pedido
            where pk_situacao = 50";
        $resource = DB::raw($sql);
        $string = $resource->getValue(DB::connection()->getQueryGrammar());
        $pedidos = DB::select($string);

        return json_encode($pedidos);

    })->name('api-faturados');
    Route::get('uptime-infos-preparados/', function () {

        $sql = "SELECT count(pk_pedido) as numero
            FROM tab_pedido
            where pk_situacao = 55";
        $resource = DB::raw($sql);
        $string = $resource->getValue(DB::connection()->getQueryGrammar());
        $pedidos = DB::select($string);

        return json_encode($pedidos);

    })->name('api-preparados');
    Route::get('uptime-infos-embalados/', function () {

        $sql = "SELECT count(pk_pedido) as numero
            FROM tab_pedido
            where pk_situacao = 80";
        $resource = DB::raw($sql);
        $string = $resource->getValue(DB::connection()->getQueryGrammar());
        $pedidos = DB::select($string);

        return json_encode($pedidos);

    })->name('api-embalados');
    Route::get('uptime-infos-assistencias/', function () {

        $sql = "SELECT count(pk_pedido) as numero
            FROM tab_pedido
            where pk_pedido_tipo = 2
            and pk_situacao <> 100";
        $resource = DB::raw($sql);
        $string = $resource->getValue(DB::connection()->getQueryGrammar());
        $pedidos = DB::select($string);

        return json_encode($pedidos);

    })->name('api-assistencias');
    Route::get('uptime-infos-pedidos/{numero}/{order}', function ($numero, $order) {

        $sql = "SELECT count(dat_fechamento) as pedidos, MONTH(dat_fechamento) as data
                FROM tab_pedido
                where dat_fechamento < NOW()
                and dat_fechamento > NOW() - interval 365 day
                and dat_fechamento < now() - interval (day(now())) day
                group by MONTH(dat_fechamento)
                order by dat_fechamento $order
                LIMIT $numero";

        $resource = DB::raw($sql);
        $string = $resource->getValue(DB::connection()->getQueryGrammar());
        $pedidos = DB::select($string);

        return json_encode($pedidos);

    })->name('api-pedidos');
    Route::get('uptime-infos-pedidos-valor/{numero}/{order}', function ($numero, $order) {

        $sql = "SELECT sum(num_valor_total) as valor, MONTH(dat_fechamento) as data
                FROM tab_pedido
                where dat_fechamento < NOW()
                and dat_fechamento > NOW() - interval 365 day
                and dat_fechamento < now() - interval (day(now())) day
                group by MONTH(dat_fechamento)
                order by dat_fechamento $order
                LIMIT $numero";

        $resource = DB::raw($sql);
        $string = $resource->getValue(DB::connection()->getQueryGrammar());
        $pedidos = DB::select($string);

        return json_encode($pedidos);

    })->name('api-pedidos-valor');
    Route::get('uptime-infos-pedidos-ultimos/', function () {

        $sql = "SELECT txt_cliente_nome as 'nome', dat_fechamento as 'dataFechamento', dat_analisado as 'dataAnalisado',
                tab_situacao.txt_descricao as 'situacao', txt_nome_ponto_venda as 'ponto'
                FROM tab_pedido
                join tab_ponto_venda on tab_ponto_venda.pk_ponto_venda = tab_pedido.pk_ponto_venda
                join tab_situacao on tab_situacao.pk_situacao = tab_pedido.pk_situacao
                order by dat_fechamento DESC
                limit 10";

        $resource = DB::raw($sql);
        $string = $resource->getValue(DB::connection()->getQueryGrammar());
        $pedidos = DB::select($string);

        return json_encode($pedidos);

    })->name('api-pedidos-ultimos');

});

