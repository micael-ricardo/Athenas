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
    <script src="js/DataTable.js"></script>
@endsection
