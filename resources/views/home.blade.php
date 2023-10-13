@extends('layout.app')
@section('title','Painel de controle')
@section('main-section')
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3"><strong>Relatório</strong> pedidos</h1>
        <div class="row">
            <div class="col-xl-6 col-xxl-5 d-flex">
                <div class="w-100">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title">Fechados</h5>
                                        </div>
                                        <div class="col-auto">
                                            <div class="stat text-primary">
                                                <i class="align-middle" data-feather="check"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <h1 class="mt-1 mb-3" id="pedidos_fechados">
                                        @foreach($dumps as $dump)
                                            @if($dump->situacao == 20)
                                                {{$dump->numero}}
                                            @endif
                                        @endforeach
                                    </h1>
                                    <div>
                                        <i class="mt-0">pedidos</i>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title">Analisados</h5>
                                        </div>

                                        <div class="col-auto">
                                            <div class="stat text-primary">
                                                <i class="align-middle" data-feather="loader"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <h1 class="mt-1 mb-3" id="pedidos_analisados">
                                        @foreach($dumps as $dump)
                                            @if($dump->situacao == 30)
                                                {{$dump->numero}}
                                            @endif
                                        @endforeach
                                    </h1>
                                    <div>
                                        <i class="mt-0">pedidos</i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title">Lançados</h5>
                                        </div>

                                        <div class="col-auto">
                                            <div class="stat text-primary">
                                                <i class="align-middle" data-feather="arrow-up"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <h1 class="mt-1 mb-3" id="pedidos_lancados">
                                        @foreach($dumps as $dump)
                                            @if($dump->situacao == 40)
                                                {{$dump->numero}}
                                            @endif
                                        @endforeach
                                    </h1>
                                    <div>
                                        <i class="mt-0">pedidos</i>
                                    </div>
                                    <div class="mb-0">
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title">Faturados</h5>
                                        </div>

                                        <div class="col-auto">
                                            <div class="stat text-primary">
                                                <i class="align-middle" data-feather="dollar-sign"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <h1 class="mt-1 mb-3" id="pedidos_faturados">
                                        @foreach($dumps as $dump)
                                            @if($dump->situacao == 50)
                                                {{$dump->numero}}
                                            @endif
                                        @endforeach
                                    </h1>
                                    <div>
                                        <i class="mt-0">pedidos</i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title">Preparados</h5>
                                        </div>

                                        <div class="col-auto">
                                            <div class="stat text-primary">
                                                <i class="align-middle" data-feather="check-square"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <h1 class="mt-1 mb-3" id="pedidos_preparados">
                                        @foreach($dumps as $dump)
                                            @if($dump->situacao == 55)
                                                {{$dump->numero}}
                                            @endif
                                        @endforeach
                                    </h1>
                                    <div>
                                        <i class="mt-0">pedidos</i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title">Embalados</h5>
                                        </div>

                                        <div class="col-auto">
                                            <div class="stat text-primary">
                                                <i class="align-middle" data-feather="package"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <h1 class="mt-1 mb-3" id="pedidos_embalados">
                                        @foreach($dumps as $dump)
                                            @if($dump->situacao == 80)
                                                {{$dump->numero}}
                                            @endif
                                        @endforeach
                                    </h1>
                                    <div>
                                        <i class="mt-0">pedidos</i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-xxl-0">
                <div class="card flex-fill w-100">
                    <div class="card-header">

                        <h5 class="card-title mb-0">Pedidos</h5>
                    </div>
                    <div class="card-body">
                        <div class="chart chart-sm">
                            <canvas id="chartjs-dashboard-line"></canvas>
                        </div>
                    </div>
                </div>

                <div class="col-md">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-1">
                                    <h5 class="card-title">Assistências</h5>
                                </div>

                                <div class="col-auto">
                                    <div class="stat text-primary">
                                        <i class="align-middle" data-feather="refresh-ccw"></i>
                                    </div>
                                </div>
                            </div>
                            <h1 class="mt-1 mb-3" id="pedidos_assistencias">
                                @foreach($assistencias as $assistencia)
                                    {{$assistencia->numero}}
                                @endforeach
                            </h1>
                            <div>
                                <i class="mt-0">pedidos</i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-6 col-xxl-3 d-flex order-2 order-xxl-3">
                <div class="card flex-fill w-100">
                    <div class="card-header">

                        <h5 class="card-title mb-0">Renda total por mês</h5>
                        <p class="card-title mb-0">ultimos 3 meses</p>
                    </div>
                    <div class="card-body d-flex">
                        <div class="align-self-center w-100">
                            <div class="py-3">
                                <div class="chart chart-xs">
                                    <canvas id="chartjs-dashboard-pie"></canvas>
                                </div>
                            </div>

                            <table class="table mb-0">
                                <tbody>
                                <tr>
                                    <td id="primeiroMes">#</td>
                                    <td class="text-end" id="valorPrimeiroMes">5000</td>
                                </tr>
                                <tr>
                                    <td id="segundoMes">#</td>
                                    <td class="text-end" id="valorSegundoMes">3801</td>
                                </tr>
                                <tr>
                                    <td id="terceiroMes">#</td>
                                    <td class="text-end" id="valorTerceiroMes">1689</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-xxl-3 d-flex order-1 order-xxl-1">
                <div class="card flex-fill">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Calendario</h5>
                    </div>
                    <div class="card-body d-flex">
                        <div class="align-self-center w-100">
                            <div class="chart">
                                <div id="datetimepicker-dashboard"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-8 col-xxl-9 d-flex">
                <div class="card flex-fill">
                    <div class="card-header">

                        <h5 class="card-title mb-0">Ultimos projetos</h5>
                    </div>
                    <table class="table table-hover my-0" id="tableProjects" style="font-size: 0.8rem">
                        <thead>
                        <tr>
                            <th>Cliente</th>
                            <th class="d-none d-xl-table-cell">Data fechamento</th>
                            <th class="d-none d-xl-table-cell">Data analise</th>
                            <th>Status</th>
                            <th class="d-none d-md-table-cell">Ponto de venda</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-12 col-lg-4 col-xxl-3 d-flex">
                <div class="card flex-fill w-100">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Pedidos mensais</h5>
                        <p class="card-title mb-0">ultimos 12 meses</p>
                    </div>
                    <div class="card-body d-flex w-100">
                        <div class="align-self-center chart chart-lg">
                            <canvas id="chartjs-dashboard-bar"></canvas>
                            <span id="valorTotal">#</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>

    </script>
@endsection
