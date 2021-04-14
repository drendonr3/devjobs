<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function show(Categoria $categoria){
        $vacantes = $categoria->vacantes()->paginate(2);
        return view('categorias.show',compact('vacantes','categoria'));
    }
}
