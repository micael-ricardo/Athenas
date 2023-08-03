function preencherCampos(data) {
    $('#modal-nome').val(data.nome);
    $('#modal-cpf').val(data.cpf);
    $('#modal-email').val(data.email);
    $('#modal-categoria_id').val(data.categoria_id);
    $('#modal-id').val(data.id);
}


// Mascara
$('#modal-cpf').inputmask('999.999.999-99');

$(document).on('click', '.btn-editar', function (e) {
    e.preventDefault();
    var id = $(this).data('id');
    console.log(id);

    carregarCategorias().then(function () {
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
    return new Promise(function (resolve, reject) {
        $.ajax({
            url: '/categorias',
            type: 'GET',
            success: function (response) {
                var categorias = response.categorias;
                var selectElement = $('#modal-categoria_id');
                selectElement.empty();
                selectElement.append('<option value="">Selecione</option>');
                categorias.forEach(function (categoria) {
                    var optionElement = $('<option>').val(categoria.id).text(categoria.nome);
                    selectElement.append(optionElement);
                });
                resolve();
            },
            error: function (error) {
                console.error('Erro ao obter as categorias:', error);
                reject();
            }
        });
    });
}


$(document).on("submit", "#formEditar", function (e) {
    e.preventDefault();
    var id = $('#modal-id').val();
    var form = $(this);
    function showError() {
        toastr.error('Ocorreu um erro ao atualizar  Pessoa.');
    }
    if ($(form).find('[required]').filter(function () { return $(this).val().trim() === ''; }).length > 0) {
        toastr.error('Por favor, preencha todos os campos obrigatórios.');
        return;
    }
    var data = form.serialize();
    $.ajax({
        url: '/pessoas/atualizar/' + id,
        type: 'POST',
        data: data,
        success: function (response, status, xhr) {
            if (xhr.status === 200) {
                toastr.success('Pessoa atualizada com sucesso!');
                $('#ModalDeletar').modal('hide');
                setTimeout(function () {
                    location.reload();
                }, 1000);
            } else {
                showError();
            }
        },
        error: function (xhr) {
            showError();
        },
        complete: function () {
            $('#ModalDeletar').modal('hide');
        }
    });
});
