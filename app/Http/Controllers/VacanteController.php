<?php

namespace App\Http\Controllers;

use App\Models\Salario;
use App\Models\Vacante;
use App\Models\Categoria;
use App\Models\Ubicacion;
use App\Models\Experiencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class VacanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vacantes = Auth::user()->vacantes()->paginate(2);
        //$vacantes = Auth::user()->vacantes()->simplePaginate(2);


        return view('vacantes.index',compact('vacantes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all();
        $experiencias = Experiencia::all();
        $ubicacions = Ubicacion::all();
        $salarios = Salario::all();

        return view('vacantes.create')
            ->with('categorias',$categorias)
            ->with('ubicacions',$ubicacions)
            ->with('salarios',$salarios)
            ->with('experiencias',$experiencias);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'titulo'=>'required|min:8',
            'categoria'=>'required',
            'experiencia'=>'required',
            'ubicacion'=>'required',
            'salario'=>'required',
            'descripcion'=>'required|min:50',
            'imagen' =>'required',
            'skills' =>'required'
        ]);

        // Almacentar en la BD
        Auth::user()->vacantes()->create([
            'titulo'=>$data['titulo'],
            'imagen'=>$data['imagen'],
            'descripcion'=>$data['descripcion'],
            'skills'=>$data['skills'],
            'categoria_id'=>$data['categoria'],
            'experiencia_id'=>$data['experiencia'],
            'ubicacion_id'=>$data['ubicacion'],
            'salario_id'=>$data['salario']
        ]);

        return redirect()->action([VacanteController::class,'index']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function show(Vacante $vacante)
    {
        return view('vacantes.show')->with('vacante',$vacante);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function edit(Vacante $vacante)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vacante $vacante)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vacante $vacante)
    {
        //
    }

    // Campos extars
    public function imagen(Request $request) {
        $imagen = $request->file('file');
        $nombreImagen = time() . '.' . $imagen->extension();
        $imagen->move(public_path('storage/vacantes/'),$nombreImagen);
        return response()->json(['correcto'=>$nombreImagen]);
    } 

    // Borrar imagen 
    public function borrarimagen(Request $request) {
        if ($request->ajax()){
            $imagen = $request->get('imagen');
            if (File::exists('storage/vacantes/'. $imagen)){
                File::delete('storage/vacantes/' . $imagen);
            }

            return response('Imagen Eliminada' ,200);
        }
    } 

    // Cambia el estado de una vacante
    public function estado(Request $request, Vacante $vacante){
        // Leer neuvo estado y asignarlo
        $vacante->activa = $request->estado;

        // Guardar en BD
        $vacante->save();

        return response()->json($vacante);
    }
}
