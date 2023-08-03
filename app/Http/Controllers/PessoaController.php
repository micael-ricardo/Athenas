<?php

namespace App\Http\Controllers;

use App\Models\Pessoa;
use Illuminate\Http\Request;

class PessoaController extends Controller
{

    public function ListarPessoas()
    {
        $dados = Pessoa::get();
        $data = array('data' => $dados);
        return response()->json($data);
    }

    public function ListarPessoa($id)
    {
        $model = Pessoa::find($id);

        if (!$model) {
            return response()->json(['error' => 'not found'], 404);
        }

        return response()->json($model);
    }

    public function InserirPessoa(Request $request)
    {                
        try {
            $this->validate($request, [
                'nome' => 'required',
                'cpf' => 'required',
                'email' => 'required',
                'categoria_id' => 'required'
            ]);
            $model = Pessoa::create($request->all());
            return response()->json($model, 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erro ao cadastrar o eletrodoméstico'], 500);
        }
    }

    public function DeletePessoa($id)
    {
        try {
            $model = Pessoa::find($id);
            $model->delete();
            return response()->json(['message' => 'Pessoa removido com sucesso'], 204);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erro ao deletar Pessoa'], 404);
        }
    }
}
