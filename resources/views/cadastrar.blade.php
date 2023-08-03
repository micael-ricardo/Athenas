@extends('template/layout')
@section('title', 'Cadastrar Pessoas')
@section('conteudo')

    <h1 class="display-6 mb-3">Cadastrar Pessoas</h1>
    <form action="/pessoas" method="post">
        <div class="row mt-4">
            <div class="form-group col-md-4">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" name="nome" id="nome" required>
            </div>
            <div class="form-group col-md-4">
                <label for="cpf">CPF:</label>
                <input type="text" class="form-control" name="cpf" id="cpf" required>
            </div>
            <div class="form-group col-md-4">
                <label for="email">E-mail</label>
                <input type="text" class="form-control" name="email" id="email" required>
            </div>
            <div class="form-group col-md-4">
                <label for="categoria">Categoria:</label>
                <select class="form-control" name="categoria_id" id="categoria_id" required>
                    <option value="">Selecione</option>
                </select>
            </div>            
        </div>
        <div class="col-md-12 mt-4">
            <button type="submit" class="btn btn-success"><i class="bi bi-save"></i> Salvar </button>
            <a href="{{ url('/listar') }}" class="btn btn-danger"><i class="bi bi-x-lg"></i>
                Cancelar</a>
        </div>
    </form>
    <script src="js/Cadastro.js"></script>
@endsection
