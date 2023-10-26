@extends('layout.app')
@section('title','Pedidos')
@section('main-section')
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3"><strong>{{$titulo}}</strong></h1>
        @if($titulo == 'Pedidos')
            <button class="btn btn-lg" id="novoPedido" style="margin-top: -2%; margin-left: 90%;" type="button"
                    data-toggle="modal" data-target="#cardNovoPedido"><strong>+novo</strong>
            </button>
        @endif
        <div class="row">
            <div class="card">
                <div class="col-md-0 mt-0">
                    <div class="p-4">
                        @if($titulo == 'Pedidos')
                            <table id="tabelaPedido" class="table table-hover table-bordered rounded table-striped">
                                <thead class="p">
                                <th>Pedido</th>
                                <th>T</th>
                                <th>A</th>
                                <th>UF</th>
                                <th>Ponto de Venda</th>
                                <th>Cliente Final</th>
                                <th>Data</th>
                                <th>Prev Embalagem</th>
                                <th>Prev Embarque</th>
                                <th>Situação</th>
                                <th>Quit</th>
                                <th>Valor</th>
                                </thead>
                                <tbody>
                                @isset($orders)
                                    @foreach($orders as $order)
                                        <tr>
                                            <td class="text-center">{{ $order->num_pedido }}</td>
                                            <td class="text-center">
                                                @switch($order->pk_pedido_tipo)
                                                    @case(2){{'A'}}@break
                                                    @case(3){{'S'}}@break
                                                    @default{{'N'}}@break
                                                @endswitch
                                            </td>
                                            <td class="text-center">{{ $order->bit_necessita_adaptacao == 0 ? 'N' : 'S' }}</td>
                                            <td class="text-center">{{ $order->txt_cliente_cidade }}</td>
                                            <td class="text-center">{{ $order->txt_nome_ponto_venda }}</td>
                                            <td class="text-center">{{ $order->txt_cliente_nome }}</td>
                                            <td class="text-center">{{ $order->dat_fechamento != '0000-00-00' ? date('d/m/y', strtotime($order->dat_fechamento)) : 'Não definida'}}</td>
                                            <td class="text-center">{{ $order->dat_previsao_embalagem != '0000-00-00' ? date('d/m/y', strtotime($order->dat_previsao_embalagem)) : 'Não definida' }}</td>
                                            <td class="text-center">{{ $order->dat_previsao_embarque != '0000-00-00' ? date('d/m/y', strtotime($order->dat_previsao_embarque)) : 'Não definida'}}</td>
                                            <td class="text-center">
                                                @switch($order->pk_situacao)
                                                    @case(1){{'Aberto'}}@break
                                                    @case(20){{'Fechado'}}@break
                                                    @case(30){{'Analisado'}}@break
                                                    @case(40){{'Lançado'}}@break
                                                    @case(50){{'Faturado'}}@break
                                                    @case(55){{'Preparado'}}@break
                                                    @case(60){{'Produção'}}@break
                                                    @case(70){{'Produzido'}}@break
                                                    @case(80){{'Embalado'}}@break
                                                    @case(90){{'Embarcado'}}@break
                                                    @case(100){{'Finalizado'}}@break
                                                @endswitch
                                            </td>
                                            <td class="text-center">{{ $order->bit_quitado == 0 ? '' : 'OK' }}</td>
                                            <td class="text-center">
                                                R$ {{ str_replace('.',',', $order->num_valor_total) }}</td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>

                        @elseif($local == 'soma-clientes')
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <label for="dataInicio">data inicial</label>
                                            <input type="date" id="dataInicio"/>
                                        </div>
                                        <div class='col mt-auto'>
                                            <label for="dataFinal">data final</label>
                                            <input type="date" id="dataFinal"/>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-sm btn-warning" id="btnBuscar">buscar</button>
                            </div>
                            @isset($orders)
                                <table id="tabelaPedido" class="table table-hover table-bordered rounded table-striped">
                                    <thead>
                                    <th>Tipo</th>
                                    <th>Loja</th>
                                    <th>Pedidos</th>
                                    <th>Valor pedido</th>
                                    <th>Valor final</th>
                                    </thead>
                                    <tbody>
                                    @foreach($orders as $order)
                                        <tr>
                                            <td>{{$order->tipo}}</td>
                                            <td>{{$order->loja}}</td>
                                            <td>{{$order->pedidos}}</td>
                                            <td>{{$order->valor}}</td>
                                            <td>{{$order->valor_final}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    @endif
                                    @elseif($local == 'entrega')
                                        @isset($orders)
                                            <table id="tabelaPedido"
                                                   class="table table-hover table-bordered rounded table-striped">
                                                <thead>
                                                <th>Carga</th>
                                                <th>Data</th>
                                                <th>Pedidos</th>
                                                </thead>
                                                <tbody>
                                                @foreach($orders as $order)
                                                    <tr>
                                                        <input type="hidden" value="{{$order->id}}" id="id_entrega">
                                                        <td>{{ $order->carga }}</td>
                                                        <td>{{ date('d/m/Y', strtotime($order->data)) }}</td>
                                                        <td>{{ $order->pedidos }}</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        @else
                                            <h3 class="text-center m-2 p-2">Não há pedidos para entrega</h3>
                                        @endif
                                    @else
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col mt-0">
                                                        <label for="dataInicio">data inicial</label>
                                                        <input type="date" id="dataInicio"/>
                                                    </div>
                                                    <div class='col mt-auto'>
                                                        <label for="dataFinal">data final</label>
                                                        <input type="date" id="dataFinal"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="btn btn-sm btn-warning" id="btnBuscar">buscar</button>
                                        </div>
                                        <table id="tabelaPedido"
                                               class="table table-hover table-bordered rounded table-striped">
                                            <thead class="p">
                                            <th>Pedido</th>
                                            <th>T</th>
                                            <th>A</th>
                                            <th>UF</th>
                                            <th>Ponto de Venda</th>
                                            <th>Cliente Final</th>
                                            <th>Data</th>
                                            <th>Prev Embalagem</th>
                                            <th>Prev Embarque</th>
                                            <th>Situação</th>
                                            <th>Quit</th>
                                            <th>Valor</th>
                                            </thead>
                                            <tbody>
                                            @isset($orders)
                                                @foreach($orders as $order)
                                                    <tr>
                                                        <td class="text-center">{{ $order->num_pedido }}</td>
                                                        <td class="text-center">
                                                            @switch($order->pk_pedido_tipo)
                                                                @case(2){{'A'}}@break
                                                                @case(3){{'S'}}@break
                                                                @default{{'N'}}@break
                                                            @endswitch
                                                        </td>
                                                        <td class="text-center">{{ $order->bit_necessita_adaptacao == 0 ? 'N' : 'S' }}</td>
                                                        <td class="text-center">{{ $order->txt_cliente_cidade }}</td>
                                                        <td class="text-center">{{ $order->txt_nome_ponto_venda }}</td>
                                                        <td class="text-center">{{ $order->txt_cliente_nome }}</td>
                                                        <td class="text-center">{{ $order->dat_fechamento != '0000-00-00' ? date('d/m/y', strtotime($order->dat_fechamento)) : 'Não definida'}}</td>
                                                        <td class="text-center">{{ $order->dat_previsao_embalagem != '0000-00-00' ? date('d/m/y', strtotime($order->dat_previsao_embalagem)) : 'Não definida' }}</td>
                                                        <td class="text-center">{{ $order->dat_previsao_embarque != '0000-00-00' ? date('d/m/y', strtotime($order->dat_previsao_embarque)) : 'Não definida'}}</td>
                                                        <td class="text-center">
                                                            @switch($order->pk_situacao)
                                                                @case(1){{'Aberto'}}@break
                                                                @case(20){{'Fechado'}}@break
                                                                @case(30){{'Analisado'}}@break
                                                                @case(40){{'Lançado'}}@break
                                                                @case(50){{'Faturado'}}@break
                                                                @case(55){{'Preparado'}}@break
                                                                @case(60){{'Produção'}}@break
                                                                @case(70){{'Produzido'}}@break
                                                                @case(80){{'Embalado'}}@break
                                                                @case(90){{'Embarcado'}}@break
                                                                @case(100){{'Finalizado'}}@break
                                                            @endswitch
                                                        </td>
                                                        <td class="text-center">{{ $order->bit_quitado == 0 ? '' : 'OK' }}</td>
                                                        <td class="text-center">
                                                            R$ {{ str_replace('.',',', $order->num_valor_total) }}</td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                            </tbody>
                                        </table>
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="cardNovoPedido" tabindex="1" role="dialog" aria-labelledby="cardNovoPedido"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-title">
                        <h2>novo pedido</h2>
                    </div>

                </div>
                <div class="modal-body">
                    <form class="" id="formularioNovoPedido">
                        <label class="form-check-label" for="pontoVendaPedido">ponto de venda</label>
                        <input type="text" class="input-group" id="pontoVendaPedido" placeholder="Ponto de venda"
                               required>

                        <label class="form-check-label" for="clientePedido">cliente</label>
                        <input type="text" class="input-group" id="clientePedido" placeholder="Nome do cliente"
                               required>

                        <label class="form-check-label" for="dataPedido">data do pedido</label>
                        <input type="date" class="input-group" id="dataPedido" required>

                        <label class="form-check-label" for="dataDespachoPedido">previsão de embarque</label>
                        <input type="date" class="input-group" id="dataDespachoPedido" required>

                        <label class="form-check-label" for="dataPrevisaoPedido">previsão de entrega</label>
                        <input type="date" class="input-group" id="dataPrevisaoPedido" required>

                        <label class="form-check-label" for="dataEmbalagemPedido">data embalado</label>
                        <input type="date" class="input-group" id="dataEmbalagemPedido" required>

                        <label class="form-check-label" for="quitacaoPedido">quitado</label>
                        <select class="input-group" id="quitacaoPedido" required>
                            <option value="1">Sim</option>
                            <option value="2">Não</option>
                        </select>

                        <label class="form-check-label" for="tipoPedido">tipo</label>
                        <select class="input-group" id="tipoPedido" required>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="2">3</option>
                            <option value="2">4</option>
                        </select>

                        <label class="form-check-label" for="valorPedido">Valor</label>
                        <input type="number" min="1" max="999999999999" class="input-group" id="valorPedido" step="any"
                               pattern="[0-9]+([,\.][0-9]+)?" required>

                        <input type="hidden" name="usuarioLogado" id="usuarioLogado" value="{{ '#' }}">

                        <div class="p-4">
                            <button id="botaoEnviar" type="submit" class="btn-warning btn btn-sm">Enviar</button>
                            <button id="botaoCancelar" type="reset" data-dismiss="modal" class="btn-white btn btn-sm">
                                Cancelar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
