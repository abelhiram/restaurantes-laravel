<?php

namespace App\Http\Controllers;

use App\Horario;
use App\Local;
use Illuminate\Http\Request;
use Session;

class HorariosController extends Controller
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
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Horario::create([
            'locales_id'=>$request['locales_id'],
            'dia'=>$request['dia'],
            'hora_apertura'=>$request['hora_apertura'],
            'hora_cierre'=>$request['hora_cierre'],
        ]);
        Session::flash('message','Horario creado correctamente');
        $local = Local::where('id', '=', $request['locales_id'])->take(1)->get(); 
        $horario = Horario::where('locales_id', '=', $request['locales_id'])->get(); 
        return view('horarios/horarios',compact('horario','local'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \restaurantes\Horario  $horario
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $local = Local::where('id', '=', $id)->take(1)->get(); 
        $horario = Horario::where('locales_id', '=', $id)->get(); 
        return view('horarios/horarios',compact('horario','local'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \restaurantes\Horario  $horario
     * @return \Illuminate\Http\Response
     */
    public function edit(Horario $horario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \restaurantes\Horario  $horario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Horario $horario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \restaurantes\Horario  $horario
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $horario = Horario::find($id);
        Horario::destroy($id);
        Session::flash('message','Horario eliminado correctamente');
        
        return Redirect('horarios/'.$horario->locales_id);
    }
}
