@extends('layout.app')
@section('title','Clientes')
@section('main-section')
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3"><strong>Clientes</strong></h1>
        <button class="btn btn-lg" id="novoCliente" style="margin-top: -2%; margin-left: 90%;" type="button"
                data-toggle="modal" data-target="#cardNovoCliente"><strong>+novo</strong>
        </button>
        <div class="row">
            <div class="card">
                <div class="col-md-0 mt-0">
                    <div class="p-4">
                        <table id="tabelaClientes" class="table table-hover border rounded">
                            <thead class="p">
                            <th>Nome</th>
                            <th>CPF</th>
                            <th>Endereço</th>
                            <th>Cidade</th>
                            <th>Loja</th>
                            <th>Pedidos</th>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="cardNovoCliente" tabindex="1" role="dialog" aria-labelledby="cardNovoCliente"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-title">
                        <h2>novo cliente</h2>
                    </div>

                </div>
                <form class="" id="formularioNovoCliente">
                    <div class="modal-body">

                        <label class="form-check-label" for="novoClienteCPF">CPF</label>
                        <input type="text" class="input-group" id="novoClienteCPF" placeholder="Digite o CPF do cliente"
                               required>
                        <label class="form-check-label" for="novoClienteNome">nome</label>
                        <input type="text" class="input-group" id="novoClienteNome" placeholder="Nome do cliente"
                               required>
                        <label class="form-check-label" for="novoClienteTelefone">Telefone</label>
                        <input type="text" class="input-group" id="novoClienteTelefone" placeholder="Telefone do cliente"
                               required>

                        <label class="form-check-label" for="infoCliente" style="margin-left: 10%;margin-top: 10%">contato</label>
                        <div class="m-4 p-4 border rounded" id="infoCliente" style="margin-bottom: 10%">
                            <input type="text" class="input-group m-1" id="novoClienteCEP" placeholder="CEP" required>
                            <input type="text" class="input-group m-1" id="novoClienteEndereco" placeholder="Endereço" required>
                            <input type="text" class="input-group m-1" id="novoClienteEnderecoNumero" placeholder="Numero" required>
                            <input type="text" class="input-group m-1" id="novoClienteBairro" placeholder="Bairro" required>
                            <input type="text" class="input-group m-1" id="novoClienteCidade" placeholder="Cidade" required>
                            <input type="text" class="input-group m-1" id="novoClienteUF" placeholder="Estado" required>
                        </div>

                        <input type="hidden" name="usuarioLogado" id="usuarioLogado" value="{{ '#' }}">
                        <input type="hidden" name="pontoLogado" id="pontoLogado" value="{{ '#' }}">

                    </div>
                    <div class="p-4 card-footer" style="text-align: right">
                        <button id="clienteEnviar" type="submit" class="btn-warning btn btn-sm">Enviar</button>
                        <button id="clienteCancelar" type="reset" data-dismiss="modal" class="btn-white btn btn-sm">
                            Cancelar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
