<?php

namespace App\Http\Controllers;

use App\Local;
use App\mdlLocalitos;
use Illuminate\Http\Request;
use Session;

class LocalesController extends Controller
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
        //$nombre=$request->get('nombre'); 

        //$expediente=$request->get('expediente');    
        $local = Local::orderBy('id','DESC')
        ->paginate(8);

        
        return view('/locales/locales',compact('local'));
        
    }

    public function mostrarLocales()
    {
        $locales = mdlLocalitos::all();
      return $locales;
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
        Local::create([
            'usuario_id'=>$request['usuario_id'],
            'nombre'=>$request['nombre'],
            'imagen_destacada'=>$request['imagen_destacada'], 
            'activo'=>$request['activo'],
        ]);
        return redirect('/locales');
    }

    /**
     * Display the specified resource.
     *
     * @param  \restaurantes\Local  $local
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('/locales/registrarLocales');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \restaurantes\Local  $local
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
     * @param  \restaurantes\Local  $local
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
     * @param  \restaurantes\Local  $local
     * @return \Illuminate\Http\Response
     */
    public function destroy(Local $local)
    {
        //
    }
}
