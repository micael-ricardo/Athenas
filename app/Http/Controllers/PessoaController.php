<?php

namespace App\Http\Controllers;

use App\Models\Pessoa;
use Illuminate\Http\Request;

class PessoaController extends Controller
{

    public function ListarPessoas()
    {
        $model = Pessoa::all(); 
        $data = ['data' => $model];
        return response()->json($data);
    }

    public function ListarPessoa($id)
    {
        $model = Pessoa::find($id);

        if (!$model) {
            return response()->json(['error' => 'não encontrado'], 404);
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
            return response()->json(['message' => 'Erro ao cadastrar pessoa'], 422);
        }
    }

    public function DeletePessoa($id)
    {
        try {
            $model = Pessoa::find($id);
            $model->delete();
            return response()->json(['message' => 'Pessoa removido com sucesso'], 204);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erro ao deletar pessoa'], 404);
        }
    }

    public function AtualizarPessoa(Request $request, $id)
    {
        try {
            $this->validate($request, [
            'nome' => 'required',
            'cpf' => 'required',
            'email' => 'required',
            'categoria_id' => 'required'
        ]);
            $model = Pessoa::findOrFail($id);
            $model->nome = $request['nome'];
            $model->cpf = $request['cpf'];
            $model->email = $request['email'];
            $model->categoria_id = $request['categoria_id'];
            $model->save();

            return response()->json(['message' => 'Pessoa atualizado com sucesso'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erro ao atualizar pessoa'], 500);
        }
    }

}
