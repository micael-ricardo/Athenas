function preencherCampos(data) {
    $('#modal-nome').val(data.nome);
    $('#modal-cpf').val(data.cpf);
    $('#modal-email').val(data.email);
    $('#modal-categoria_id').val(data.categoria_id);
    $('#modal-id').val(data.id);
}
$(document).on('click', '.btn-editar', function (e) {
    e.preventDefault();
    var id = $(this).data('id');
    console.log(id);

    carregarCategorias().then(function() {
        $.ajax({
            type: 'GET',
            url: '/pessoas/' + id,
            success: function (data) {
                preencherCampos(data);
                $('#editarModal').modal('show');
            },
            error: function (error) {
                console.log('Erro ao obter os dados da pessoa');
            }
        });
    });
});

function carregarCategorias() {
    return new Promise(function(resolve, reject) {
        $.ajax({
            url: '/categorias',
            type: 'GET',
            success: function(response) {
                var categorias = response.categorias;
                var selectElement = $('#modal-categoria_id');
                selectElement.empty();
                selectElement.append('<option value="">Selecione</option>');
                categorias.forEach(function(categoria) {
                    var optionElement = $('<option>').val(categoria.id).text(categoria.nome);
                    selectElement.append(optionElement);
                });
                resolve();
            },
            error: function(error) {
                console.error('Erro ao obter as categorias:', error);
                reject();
            }
        });
    });
}
