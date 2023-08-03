$(document).ready(function() {

    var apiUrl = '/pessoas';
    var columns = [{
            data: 'id',
            className: 'text-center'
        },
        {
            data: 'nome'
        },
        {
            data: 'cpf'
        },
        {
            data: 'email'
        },
        {
            data: 'categoria_id',
            className: 'text-center'
        },
        {
            data: null,
            render: function(data, type, row) {
                if (row.categoria_id === 1 || row.categoria_id === 2) {
                    return '<span class="btn btn-warning btn-sm"> Ouro </span>';
                } else if (row.categoria_id === 3) {
                    return '<span class="btn btn-secondary btn-sm"> Prata </span>';
                } else {
                    return '';
                }
            },
            className: 'text-center'
        },
        {
            data: null,
            render: function(data, type, row) {
                var nome = data.nome;
                var btnEditar = '<a href="/candidatos/' + data.id + '/edit" class="btn btn-info btn-sm"><i class="bi bi-pencil"></i></a>';
                var btnDeletar = '<button type="button" data-bs-target="#ModalDeletar" data-bs-toggle="modal" data-id="' + data.id + '" data-nome="' + nome + '" class="btn btn-danger btn-sm excluir-pessoa"><i class="bi bi-trash"></i></button>';
                return btnEditar + ' ' + btnDeletar;
            },
            className: 'text-center'
        }
    ]

    $('#pessoasTable').DataTable({
        ajax: {
            url: apiUrl,
            method: 'GET',
        },
        columns: columns,
        responsive: true,
        language: {
            "sEmptyTable": "Nenhum registro encontrado",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
            "sInfoFiltered": "(Filtrados de _MAX_ registros)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "_MENU_ resultados por página",
            "sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...",
            "sZeroRecords": "Nenhum registro encontrado",
            "sSearch": "Pesquisar",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "Último"
            }
        },
        lengthMenu: [
            [5, 10, 20, 50, -1],
            [5, 10, 20, 50, "Todos"]
        ],
        pageLength: 5
    });
});