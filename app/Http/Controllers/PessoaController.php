<?php

namespace App\Http\Controllers;

use App\Models\Pessoa;
use Illuminate\Http\Request;

class PessoaController extends Controller
{

    public function ListarPessoas()
    {
        $model = Pessoa::paginate();

        return response()->json($model);
    }

    public function ListarPessoa($id)
    {
        $model = Pessoa::find($id);

        if(!$model){
            return response()->json(['error'=>'not found'], 404);
        }

        return response()->json($model);
    }

    public function InserirPessoa(Request $request)
    {

        $this->validate($request, [
            'nome' => 'required',
            'cpf' => 'required',
            'email' => 'required',
            'categoria_id' => 'required'
        ]);

        $model = Pessoa::create($request->all());

        return response()->json($model, 201);
    }

    public function DeletePessoa(Request $request, $id)
    {   
        $modal = Pessoa::find($id);

        if(!$modal){
            return response()->json(['error' => 'not found'], 404);
        }
         
        $modal->delete();
        return response()->json([], 204);
    }

}
