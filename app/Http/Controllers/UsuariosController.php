<?php

namespace App\Http\Controllers;

use App\Usuario;
use App\Local;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Auth;


class UsuariosController extends Controller
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
        $usuario = Usuario::orderBy('id','DESC')
        ->paginate(7);

        return view('/usuarios/usuarios',compact('usuario'));
    }

    public function inlog(){
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('correo', 'contrasena');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('/');
        }
        if (Auth::attempt(['correo' => $correo, 'contrasena' => $contrasena], $remember)) {
            // The user is being remembered...
        }
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
        //return Redirect::to('/personal');
        Usuario::create([
            'nombre'=>$request['nombre'],
            'apellidos'=>$request['apellidos'],
            'correo'=>$request['correo'],
            'contrasena'=>$request['contrasena'],
            'nombre_comercial'=>$request['nombre_comercial'],
            'telefono'=>$request['telefono'], 
            'rol'=>$request['rol'], 
            'genero'=>$request['genero'],   
            'foto'=>$request['foto'], 
        ]);
        return Redirect('/usuarios');
    }

    /**
     * Display the specified resource.
     *
     * @param  \restaurantes\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('/usuarios/registrarUsuario');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \restaurantes\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('usuarios/modificarUsuario',['usuario'=>$usuario]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \restaurantes\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $usuario = Usuario::findOrFail($id);
        $usuario->fill($request->all());
        $usuario->save();

        Session::flash('message','Usuario editado correctamente');
        return Redirect('/usuarios');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \restaurantes\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $locales = Local::where('usuario_id',$id)->delete();
        Usuario::destroy($id);
        Session::flash('message','Usuario eliminado correctamente');
        return Redirect('/usuarios');
    }
}
