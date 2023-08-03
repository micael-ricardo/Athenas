<?php

namespace App\Http\Controllers;

use App\Models\Categoria;


class CategoriaController extends Controller
{

    public function ListarCategorias()
    {
        $categorias = Categoria::all();
        return response()->json(['categorias' => $categorias]);
    }

}
