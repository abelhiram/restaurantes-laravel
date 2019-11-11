@extends('layouts.principal')

@section('contenido')	
<ol class="breadcrumb">
  <li>{!!link_to_route('direcciones.show', $title = 'Direcciones', $parameters = 1, $attributes = ['class'=>'']);!!}</li>
  <li class="active">Registrar dirección</li>
</ol>
<div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Modificar información del local</div>
      <div class="card-body">
        {!!Form::model($local,['route'=>['locales.update',$local->id],'method'=>'PUT', 'class'=>'jumbotron'])!!}
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">

                <div class="form-label-group">
                  <label for="usuario_id">usuario id</label>
                  {!!Form::text('usuario_id',null,['id'=>'usuario_id','class'=>'form-control','placeholder'=>'Nombre','required'=>'required','autofocus'=>'autofocus'])!!}
                  
                  <label for="nombre">nombre del local</label>
                </div>
              </div>            
              <div class="col-md-12">
                <div class="form-label-group">
                  {!!Form::text('nombre',null,['id'=>'nombre','class'=>'form-control','placeholder'=>'Apellidos','required'=>'required','autofocus'=>'autofocus'])!!}
                   
                </div>
              </div>
            </div>
          </div>
<br>
<br>
        <div class="container">
          <div class="form-group">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">imagen destacada</span>
              </div>
              <div class="custom-file">
                {!!Form::file('imagen_destacada',['id'=>'imagen_destacada','class'=>'form-control'])!!}
                <label class="custom-file-label" for="imagen_destacada"></label>
              </div>
            </div>
          </div>
          </div>
          <div class="container">
          <div class="form-group">
            <div class="form-row">
              <div class="input-group col-md-6">
      				  <div class="input-group-prepend">
      				    <label class="input-group-text" for="activo">Activo</label>
      				  </div>
                {!!Form::select('activo',['1' => 'Abierto','2'=>'Cerrado'],null, ['id'=>'activo','class' => 'custom-select'])!!}
				      </div>
            </div>
          </div>
          </div>
          {!!Form::submit('Registrar',['class'=>'btn btn-primary btn-block'])!!}
        {!!Form::close()!!}
      </div>
    </div>
  </div>
@endsection