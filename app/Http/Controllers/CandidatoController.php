<?php

namespace App\Http\Controllers;

use App\Models\Vacante;
use App\Models\Candidato;
use Illuminate\Http\Request;
use App\Notifications\NuevoCandidato;

class CandidatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Obtener id vacante actual
        $idVacante = $request->route('vacante');

        // Obbener vacante por id
        $vacante=Vacante::findOrFail($idVacante);

        return view('candidatos.index')->with('vacante',$vacante);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validacion
        $data = $request->validate([
            'nombre'=>'required',
            'email'=>'required|email',
            'cv'=>'required|mimes:pdf|max:1000',
            'vacante_id' => 'required'
        ]);
        
        // Una forma
        // $candidato = new Candidato();
        // $candidato->nombre = $data['nombre'];
        // $candidato->email = $data['email'];

        // // Segunda Forma
        // $candidato = new Candidato($data);
        
        // Alamacentar archivo pdf
        $nombreArchivo='';
        if ($request->file('cv')) {
            $archivo = $request->file('cv');
            $nombreArchivo = time() . "." . $request->file('cv')->extension();
            $ubicacion = public_path('/storage/cv');
            $archivo->move($ubicacion, $nombreArchivo);
        }
        $vacante = Vacante::find($data['vacante_id']);

        $vacante->candidatos()->create([
            'nombre'=>$data['nombre'],
            'email'=>$data['email'],
            'cv'=>$nombreArchivo
        ]);

        $vacante->usuario->notify(new NuevoCandidato($vacante));

        return back()->with('estado','Tus datos se enviaron Correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
