$('document').ready(function () {

    $('#tabelaPedido').DataTable({
        autoWidth: false,
        buttons: true,
        ordering: false,
        language: {
            "lengthMenu": "Mostrando _MENU_ registros por pagina",
            "zeroRecords": "Nenhum registro a ser mostrado",
            "info": "Mostrando pagina _PAGE_ de _PAGES_",
            "infoEmpty": "Tabela vazia",
            "infoFiltered": "(Filtrados _MAX_ de todos os resultados)",
            "search": "Buscar registro",
            "paginate": {
                "first": "Primeira",
                "last": "Ultima",
                "next": "Proxima",
                "previous": "Anterior",
            },
            "columnDefs": [
                {"className": "dt-left", "targets": "_all"}
            ],
        }
    });
    $('#tabelaClientes').DataTable({
        autoWidth: false,
        buttons: true,
        ordering: false,
        language: {
            "lengthMenu": "Mostrando _MENU_ registros por pagina",
            "zeroRecords": "Nenhum registro a ser mostrado",
            "info": "Mostrando pagina _PAGE_ de _PAGES_",
            "infoEmpty": "Tabela vazia",
            "infoFiltered": "(Filtrados _MAX_ de todos os resultados)",
            "search": "Buscar registro",
            "paginate": {
                "first": "Primeira",
                "last": "Ultima",
                "next": "Proxima",
                "previous": "Anterior",
            },
            "columnDefs": [
                {"className": "dt-left", "targets": "_all"}
            ],
        }
    });

    $('#novoPedido').click('click', function () {
        $('#formularioNovoPedido').each(function () {
            this.reset();
        });
        console.log(200);
    });

});
