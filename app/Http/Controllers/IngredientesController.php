<?php

namespace App\Http\Controllers;

use App\Ingrediente;
use App\Comida;
use Illuminate\Http\Request;
use Session;

class IngredientesController extends Controller
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

        Ingrediente::create([
            'comidas_id'=>$request['comidas_id'],
            'nombre'=>$request['nombre'],
            'precio'=>$request['precio'],
        ]);

        Session::flash('message','Ingrediente agregado correctamente');

        $ingrediente = Ingrediente::where('comidas_id', '=', $request['comidas_id'])->get(); 
        $comida = Comida::where('id', '=', $request['comidas_id'])->take(1)->get(); 
        return view('ingredientes/ingredientes',compact('comida','ingrediente'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \restaurantes\Ingrediente  $ingrediente
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ingrediente = Ingrediente::where('comidas_id', '=', $id)->get(); 
        $comida = Comida::where('id', '=', $id)->take(1)->get(); 
        return view('ingredientes/ingredientes',compact('comida','ingrediente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \restaurantes\Ingrediente  $ingrediente
     * @return \Illuminate\Http\Response
     */
    public function edit(Ingrediente $ingrediente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \restaurantes\Ingrediente  $ingrediente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ingrediente $ingrediente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \restaurantes\Ingrediente  $ingrediente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $ingrediente = Ingrediente::find($id);

        Ingrediente::destroy($id);
        Session::flash('message','Ingrediente eliminado correctamente');
        
        return Redirect('ingredientes/'.$ingrediente->comidas_id);
    }
}
