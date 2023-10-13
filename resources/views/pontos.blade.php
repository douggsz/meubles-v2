@extends('layout.app')
@section('title','Pontos de venda')
@section('main-section')

    <h3>Pontos de venda
        <button class="btn btn-warning btn-sm" id="btnNovoPonto" style="margin-left: 80%" data-toggle="modal"
                data-target="#cardNovoPonto">
            <strong>+novo</strong>
        </button>
    </h3>

    <div id="map" class="card" style="height: 40rem;width: 100%;"></div>

    <h4 id="pontos" class="m-6 p-6"></h4>

    <div class="modal fade" id="cardNovoPonto" tabindex="1" role="dialog" aria-labelledby="cardNovoPonto"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-title">
                        <h2>novo ponto</h2>
                    </div>
                </div>
                <form action="#" method="POST" id="formularioNovoPonto">
                    <div class="modal-body">
                        <label class="form-check-label" for="pontoVenda">nome ponto de venda</label>
                        <input type="text" class="input-group" id="pontoVenda" placeholder="Nome do ponto de venda"
                               required>
                        <label class="form-check-label" for="cepPontoVenda" minlength="8" maxlength="8">CEP</label>
                        <input type="text" class="input-group" id="cepPontoVenda" placeholder="CEP" required>
                        <label class="form-check-label" for="enderecoPontoVenda">endereço</label>
                        <input type="text" class="input-group" id="enderecoPontoVenda" placeholder="Endereço" disabled>
                        <label class="form-check-label" for="numeroPontoVenda">numero</label>
                        <input type="text" class="input-group" id="numeroPontoVenda" placeholder="Numero" required>
                        <label class="form-check-label" for="bairroPontoVenda">bairro</label>
                        <input type="text" class="input-group" id="bairroPontoVenda" placeholder="Bairro" disabled>
                        <label class="form-check-label" for="cidadePontoVenda">cidade</label>
                        <input type="text" class="input-group" id="cidadePontoVenda" placeholder="Cidade" disabled>
                        <label class="form-check-label" for="estadoPontoVenda">estado</label>
                        <input type="text" class="input-group" id="estadoPontoVenda" placeholder="Estado" disabled>
                    </div>
                    <div class="card-footer" style="text-align: right">
                        <button type="submit" class="btn btn-sm btn-warning">enviar</button>
                        <button type="reset" onclick="limpa_formulario()" data-dismiss="modal" class="btn btn-sm btn-white">cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">
$(document).ready(function () {

        let map;

        async function initMap() {

            const position = {lat: -14.1491354, lng: -61.9857886};
            const {Map} = await google.maps.importLibrary("maps");
            const {AdvancedMarkerView} = await google.maps.importLibrary("marker");

            map = new Map(document.getElementById("map"), {
                zoom: 4,
                center: position,
                mapId: "DEMO_MAP_ID",
            });

            $.getJSON('http://127.0.0.1:8000/api/lojas', function (data) {

                for (index = 0; index < data.length; index++) {

                    if (data[index]["ponto"] != "" && data[index]["ponto"] != "Dumar") {

                        let nome = data[index]["ponto"];
                        let address = 'https://maps.googleapis.com/maps/api/geocode/json?address=' + data[index]["endereco"] + '&key=AIzaSyBg4qWmpGs4fnYJGsgfGqTiIgdsj_xoSTQ';

                        $.getJSON(address, function (resource) {

                            let latitude = resource["results"][0]["geometry"]["location"]["lat"];
                            let longitute = resource["results"][0]["geometry"]["location"]["lng"];

                            nome.replace(' ', '')
                            window[nome] = new AdvancedMarkerView({
                                map: map,
                                position: {lat: latitude, lng: longitute},
                                title: nome,
                            });

                        })

                        if (data[index]["ponto"] == 'Bartz Móveis Camaquã') {
                            $('#pontos').append("<div class='m-4 p-2 mt-4 border rounded'>" +
                                "<h3><strong>" + data[index]["ponto"] + "</strong></h3>" +
                                "<p>" + data[index]["endereco"] + "</p>" +
                                "<i class='text-danger text-sm'>loja matriz e nossa fabrica</i></div>");
                        } else {
                            $('#pontos').append("<div class='m-4 p-2 mt-4'>" +
                                "<h3><strong>" + data[index]["ponto"] + "</strong></h3>" +
                                "<p>" + data[index]["endereco"] + "</p></div>");
                        }
                    }
                }

            })
        }

        initMap();

        function limpa_formulario() {
            $('#enderecoPontoVenda').attr('value', '');
            $('#pontoVenda').attr('value', '');
            $('#cepPontoVenda').attr('value', '');
            $('#bairroPontoVenda').attr('value', '');
            $('#estadoPontoVenda').attr('value', '');
            $('#cidadePontoVenda').attr('value', '');
            alert("Formulário limpo!");
        }

        document.getElementById('cepPontoVenda').addEventListener('change', function () {

            cep = document.getElementById('cepPontoVenda').value;

            url = 'https://viacep.com.br/ws/' + cep + '/json/';

            $.getJSON(url, function (getCEP) {
                $('#enderecoPontoVenda').attr('value', getCEP["logradouro"])
                $('#bairroPontoVenda').attr('value', getCEP["bairro"])
                $('#estadoPontoVenda').attr('value', getCEP["uf"])
                $('#cidadePontoVenda').attr('value', getCEP["localidade"])
                $('#numeroPontoVenda').focus();
            });


        });
});
    </script>
@endsection
