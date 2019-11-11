<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;
use Session;

class CategoriasController extends Controller
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
        $categoria = Categoria::orderBy('id','DESC')
        ->paginate(5);

        
        return view('/categorias/categorias',compact('categoria'));
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
        Categoria::create([
            'nombre'=>$request['nombre'],
        ]);
        Session::flash('message','Categoria creada correctamente');
        return redirect('/categorias');
    }
    
    public function crear(Request $request)
    {
        /*Categoria::create([
            'nombre'=>$request['nombre'],
        ]);*/

        $localitos = Categoria::where('nombre',$request['nombre'])->get();
      	return $localitos;
    }

   

    /**
     * Display the specified resource.
     *
     * @param  \restaurantes\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('/categorias/registrarCategorias');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \restaurantes\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit(Categoria $categoria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \restaurantes\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categoria $categoria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \restaurantes\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Categoria::destroy($id);
        Session::flash('message','Categoría eliminada correctamente');
        return Redirect('/categorias');
    }
}
