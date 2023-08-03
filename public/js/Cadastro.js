$(document).on("submit", "form", function(e) {
    e.preventDefault();
    var form = this;
    $.ajax({
        url: 'pessoas',
        type: 'POST',
        data: $(form).serialize(),
        dataType: 'json',
        success: function(response, status, xhr) {
            if (xhr.status === 201) {
                toastr.success('Pessoa cadastrada com sucesso!');
                setTimeout(function() {
                    window.location.href = '/listar';
                }, 1000); 
            } else {
                toastr.error('Erro ao cadastrar pessoa.');
            }
        },
        error: function(xhr, status, error) {
            $('#mensagemErro').text('Ocorreu um erro: ' + error);
        }
    });
});

$('#cpf').inputmask('999.999.999-99');