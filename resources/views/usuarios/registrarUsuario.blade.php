@extends('layouts.principal')

@section('contenido')
<h3>Registrar usuario</h3>
<ol class="breadcrumb">
  <li>{!!link_to_route('usuarios.index', $title = 'Usuarios', $parameters = 1, $attributes = ['class'=>'']);!!}</li>
  <li class="active">Registrar Usuario</li>
</ol>	
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"></div>
                	  <div class="card-body">
                        <div class="form-group row" style="margin-top:15px;">
                            <div class="col-md-6">
                            {!!Form::open(['route'=>'usuarios.store', 'method'=>'POST', 'enctype'=>'multipart/form-data'])!!}
                            </div>
						            </div>
						            <div class="form-group row">
                            <label for="dia" class="col-md-4 col-form-label text-md-right">Nombre</label>
                            <div class="col-md-6">
                            {!!Form::text('nombre',null,['id'=>'nombre','class'=>'form-control','placeholder'=>'Nombre','required'=>'required','autofocus'=>'autofocus'])!!}
                            </div>
						            </div>
						            <div class="form-group row">
                            <label for="dia" class="col-md-4 col-form-label text-md-right">Apellidos</label>
                            <div class="col-md-6">
                            {!!Form::text('apellidos',null,['id'=>'apellidos','class'=>'form-control','placeholder'=>'Apellidos','required'=>'required','autofocus'=>'autofocus'])!!}
                            </div>
						            </div>
						            <div class="form-group row">
                            <label for="hora_entrada" class="col-md-4 col-form-label text-md-right">Correo electrónico</label>
                            <div class="col-md-6">
                            {!!Form::text('correo',null,['id'=>'correo','class'=>'form-control','placeholder'=>'Correo electrónico','required'=>'required','autofocus'=>'autofocus'])!!}
                            </div>
						            </div>
						            <div class="form-group row">
                            <label for="hora_salida" class="col-md-4 col-form-label text-md-right">Teléfono</label>
                            <div class="col-md-6">
                            {!!Form::text('telefono',null,['id'=>'telefono','class'=>'form-control','placeholder'=>'telefono','required'=>'required','autofocus'=>'autofocus'])!!}
                            </div>
						            </div>
                        <div class="form-group row">
                            <label for="hora_salida" class="col-md-4 col-form-label text-md-right">Género</label>
                            <div class="col-md-6">
                            {!!Form::select('genero',['hombre' => 'Hombre','mujer'=>'Mujer','indistinto' => 'Indistinto'],null, ['id'=>'genero','class' => 'form-control'])!!}
                            </div>
						            </div>
                        <div class="form-group row">
                            <label for="hora_salida" class="col-md-4 col-form-label text-md-right">Rol</label>
                            <div class="col-md-6">
                            {!!Form::select('rol',['comensal' => 'Comensal','empresa'=>'Empresa','administrador' => 'Administrador'],null, ['id'=>'rol','class' => 'form-control'])!!}
                            </div>
						            </div>
                        <div class="form-group row">
                            <label for="hora_salida" class="col-md-4 col-form-label text-md-right">Nombre comercial</label>
                            <div class="col-md-6">
                            {!!Form::text('nombre_comercial',null,['id'=>'nombre_comercial','class'=>'form-control','placeholder'=>'Nombre comercial','required'=>'required','autofocus'=>'autofocus'])!!}
                            </div>
						            </div>
                                    <div class="form-group row">
                                        <label for="hora_salida" class="col-md-4 col-form-label text-md-right">Contraseña</label>
                                        <div class="col-md-6">
                                        {!!Form::password('contrasena',['id'=>'contraseña','class'=>'form-control','placeholder'=>'contraseña','required'=>'required','autofocus'=>'autofocus'])!!}
                                        </div>
						            </div>
                                    <div class="form-group row">
                                        <label for="hora_salida" class="col-md-4 col-form-label text-md-right">Foto</label>
                                        <div class="col-md-6">
                                        {!!Form::file('foto',['id'=>'foto','class'=>'form-control'])!!}
                                        </div>
						            </div>
						            <div class="form-group row mb-0">
                                        <div class="col-md-4 col-form-label text-md-right"></div>
                                        <div class="col-md-6 offset-md-4">
                                                        {!!Form::submit('Registrar',['class'=>'btn btn-primary btn-block'])!!}
                                        {!!Form::close()!!}
                                        </div>
					  	          </div>
					        </div>
				      </div>
			    </div>
		  </div>
	</div>  
@endsection