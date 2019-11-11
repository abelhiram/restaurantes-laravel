<?php

namespace App\Http\Controllers;

use App\Comida;
use App\Local;
use App\Categoria;
use App\Ingrediente;
use Illuminate\Http\Request;
use Session;

class ComidasController extends Controller
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
        $categoria = Categoria::where('nombre',$request['categorias_id'])->first(); 

        Comida::create([
            'locales_id'=>$request['locales_id'],
            'categorias_id'=>$categoria->id,
            'nombre'=>$request['nombre'],
            'descripcion'=>$request['descripcion'],
            'precio'=>$request['precio'],
            'foto_comida'=>$request['foto_comida'],
        ]);
        Session::flash('message','Comida agregada correctamente');
        $local = Local::where('id', '=', $request['locales_id'])->take(1)->get(); 
        $comida = Comida::where('locales_id', '=', $request['locales_id'])->get(); 
        return view('comidas/comidas',compact('comida','local'));

    }

    public function autocomplete(Request $request)
    {
        $data = Categoria::select("nombre as name")->where("nombre","LIKE","%{$request->input('query')}%")->get();
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \restaurantes\Comida  $comida
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $local = Local::where('id', '=', $id)->take(1)->get(); 
        $comida = Comida::where('locales_id', '=', $id)->get(); 
        return view('comidas/comidas',compact('comida','local'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \restaurantes\Comida  $comida
     * @return \Illuminate\Http\Response
     */
    public function edit(Comida $comida)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \restaurantes\Comida  $comida
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comida $comida)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \restaurantes\Comida  $comida
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comida = Comida::find($id);
        Ingrediente::where('comidas_id', '=', $id)->delete(); 
        Comida::destroy($id);
        Session::flash('message','Comida eliminada correctamente');
        
        return Redirect('comidas/'.$comida->locales_id);
    }
}
