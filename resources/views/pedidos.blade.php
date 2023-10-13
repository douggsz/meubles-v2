@extends('layout.app')
@section('title','Pedidos')
@section('main-section')
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3"><strong>Pedidos</strong></h1>
        <button class="btn btn-lg" id="novoPedido" style="margin-top: -2%; margin-left: 90%;" type="button"
                data-toggle="modal" data-target="#cardNovoPedido"><strong>+novo</strong>
        </button>
        <div class="row">
            <div class="card">
                <div class="col-md-0 mt-0">
                    <div class="p-4">
                        <table id="tabelaPedido" class="table table-hover border rounded">
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

                            </tbody>
                        </table>
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
                        <input type="text" class="input-group" id="pontoVendaPedido" placeholder="Ponto de venda" required>

                        <label class="form-check-label" for="clientePedido">cliente</label>
                        <input type="text" class="input-group" id="clientePedido" placeholder="Nome do cliente" required>

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
