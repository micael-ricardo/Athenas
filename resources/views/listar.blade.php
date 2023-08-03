<!DOCTYPE html>
<html>

<head>
    <title>Athenas</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
</head>

<body>
    <table id="pessoasTable" class="display">
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#pessoasTable').DataTable({
                ajax: {
                    url: '/pessoas',
                    method: 'GET',
                },
                columns: [{
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
                            console.log(row.categoria_id );
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
            });
        });
    </script>
</body>

</html>
