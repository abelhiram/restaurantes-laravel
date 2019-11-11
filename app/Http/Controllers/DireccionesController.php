<?php

namespace App\Http\Controllers;

use App\Direccion;
use App\Local;
use App\Usuario;
use App\Pais;
use App\Estado;
use App\Municipio;
use Illuminate\Http\Request;
use Session;

class DireccionesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(request $request)
    {
        $local = Local::where('id', '=', $request->id)->get(); 
        $pais = Pais::get();
        $estado = Estado::get()->prepend('');
        $municipio= Municipio::get();
        return view('direcciones/registrarDireccion',compact('local','pais','estado','municipio'));
    }

    public function getTowns(Request $request, $id){
            $towns = Municipio::where('estado_id', '=', $id)->pluck('nombre','id'); 
            return response()->json($towns); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Direccion::create([
            'locales_id'=>$request['locales_id'],
            'pais_id'=>$request['pais']+1,
            'estados_id'=>$request['estado'],
            'municipios_id'=>$request['town'],
            'cp'=>$request['cp'],
            'calle'=>$request['calle'],
            'numero'=>$request['numero'],
            'entre_calles'=>$request['entre_calles'],
            'referencias'=>$request['referencias'],
        ]);
        Session::flash('message','Dirección creada correctamente');
        $local = Local::where('id', '=', $request['locales_id'])->take(1)->get(); 
        $direccion = Direccion::where('locales_id', '=', $request['locales_id'])->get(); 
        return view('direcciones/direcciones',compact('local','direccion'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \restaurantes\Direccion  $direccion
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $local = Local::where('id', '=', $id)->take(1)->get(); 
        $direccion = Direccion::where('locales_id', '=', $id)->get(); 
        return view('direcciones/direcciones',compact('local','direccion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \restaurantes\Direccion  $direccion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $local = Local::findOrFail($id);
        return view('locales/modificarLocal',['local'=>$local]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \restaurantes\Direccion  $direccion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $local = Local::findOrFail($id);
        $local->fill($request->all());
        $local->save();

        Session::flash('message','Local editado correctamente');
        return Redirect('/locales');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \restaurantes\Direccion  $direccion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Direccion $direccion)
    {
        $horario = Horario::find($id);
        Horario::destroy($id);
        Session::flash('message','Horario eliminado correctamente');
        
        return Redirect('horarios/'.$horario->locales_id);
    }
}
