@extends('template/layout')
@section('title', 'Pessoas Cadastradas')
@section('conteudo')

    <div class="input-group mb-3">
        <div class="input-group-append">
            <a href="{{ url('/cadastrar') }}" class="btn btn-success"><i class="bi bi-plus"></i> Adicionar</a>
        </div>
    </div>

    <h1 class="display-6 mb-3">Pessoas Cadastradas</h1>
    <table id="pessoasTable" class="table table-striped w-100">
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
    {{-- Modal Delete --}}
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

    <!-- Modal de Edição -->
    <div class="modal fade" id="editarModal" tabindex="-1" role="dialog" aria-labelledby="editarModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editarModalLabel">Editar Pessoa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/pessoas/atualizar/{id}" method="post">
                        <input type="hidden" name="id" id="modal-id">

                        <div class="form-group">
                            <label for="modal-nome">Nome:</label>
                            <input type="text" class="form-control" name="nome" id="modal-nome" required>
                        </div>
                        <div class="form-group">
                            <label for="modal-cpf">CPF:</label>
                            <input type="text" class="form-control" name="cpf" id="modal-cpf">
                        </div>
                        <div class="form-group">
                            <label for="modal-email">E-mail:</label>
                            <input type="text" class="form-control" name="email" id="modal-email">
                        </div>
                        <div class="form-group">
                            <label for="modal-categoria">Categoria:</label>
                            <select class="form-control" name="categoria_id" id="modal-categoria_id" required>
                                <option value="">Selecione</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success"><i class="bi bi-save"></i> Salvar </button>
                </div>
            </div>
        </div>
    </div>

    <script src="js/DataTable.js"></script>
    <script src="js/ModalDelete.js"></script>
    <script src="js/ModalEditar.js"></script>
@endsection
