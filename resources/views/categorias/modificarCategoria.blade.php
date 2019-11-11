@extends('layouts.principal')

@section('contenido')	
<div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Registro de Categoria</div>
      <div class="card-body">
        {!!Form::open(['route'=>'categorias.store', 'method'=>'POST', 'enctype'=>'multipart/form-data'])!!}
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  {!!Form::text('nombre',null,['id'=>'nombre','class'=>'form-control','placeholder'=>'Nombre','required'=>'required','autofocus'=>'autofocus'])!!}
                  <label for="nombre">Nombre</label>
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