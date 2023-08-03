@extends('template/layout')
@section('title', 'Pessoas Cadastradas')
@section('conteudo')

    <h1 class="display-6 mb-3">Pessoas Cadastradas</h1>
    <table id="pessoasTable" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Código</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>E-mail</th>
                <th>Categoria</th>
                <th>Classificação</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    <script>
        $(document).ready(function() {

            var apiUrl = '/pessoas';
            var columns = [{
                    data: 'id'
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
                    data: 'categoria_id'
                },
                {
                    data: null,
                    render: function(data, type, row) {
                        if (row.categoria_id === 1 || row.categoria_id === 2) {
                            return 'Ouro';
                        } else if (row.categoria_id === 3) {
                            return 'Prata';
                        } else {
                            return '';
                        }
                    }
                },
                {
                    data: null,
                    render: function(data, type, row) {
                        return '<button class="editBtn" data-id="' + row.Codigo +
                            '">Editar</button>' +
                            '<button class="deleteBtn" data-id="' + row.Codigo +
                            '">Excluir</button>';
                    }
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
    </script>

@endsection
