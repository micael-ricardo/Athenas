@extends('template/layout')
@section('title', 'Pessoas Cadastradas')
@section('conteudo')

    <div class="input-group mb-3">
        <div class="input-group-append">
            <a href="{{ url('/cadastrar') }}" class="btn btn-success"><i class="bi bi-plus"></i> Adicionar</a>
        </div>
    </div>

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
    <div class="modal fade" id="ModalDeletar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
        role="dialog" aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="exampleModalLabel">Excluir Pessoa</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="modal-body" class="modal-body">
                    Tem certeza que deseja excluir: <b><span id="nome-pessoa"> </span></b> ? Esta ação
                    não pode ser desfeita.
                </div>
                <div class="modal-footer">
                    <form id="formExcluir" method="post">
                        <input type="hidden" name="id">
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="js/DataTable.js"></script>
    <script src="js/Modal.js"></script>
@endsection
