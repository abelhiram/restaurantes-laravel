@extends('layouts.principal')

@section('contenido')	
<h3>Registrar local</h3>
<ol class="breadcrumb">
  <li>{!!link_to_route('locales.index', $title = 'Locales', $parameters = "", $attributes = ['class'=>'']);!!}</li>
  <li class="active">Registrar local</li>
</ol>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body">
                    <div class="form-group row" style="margin-top:15px;">
                        <div class="col-md-6">
                            {!!Form::open(['route'=>'locales.store', 'method'=>'POST', 'enctype'=>'multipart/form-data'])!!}
                        </div>
					</div>
                    <div class="form-group row">
                        <label for="hora_salida" class="col-md-4 col-form-label text-md-right">ID</label>
                        <div class="col-md-6">
                        {!!Form::text('usuario_id',null,['id'=>'usuario_id','class'=>'form-control','placeholder'=>'Id','required'=>'required','autofocus'=>'autofocus'])!!}
                        </div>
					</div>
                    <div class="form-group row">
                        <label for="hora_salida" class="col-md-4 col-form-label text-md-right">Nombre del local</label>
                        <div class="col-md-6">
                        {!!Form::text('nombre',null,['id'=>'nombre','class'=>'form-control','placeholder'=>'Nombre del local','required'=>'required','autofocus'=>'autofocus'])!!}
                        </div>
					</div>
                    <div class="form-group row">
                        <label for="hora_salida" class="col-md-4 col-form-label text-md-right">Estatus</label>
                        <div class="col-md-6">
                        {!!Form::select('activo',['1' => 'Abierto','2'=>'Cerrado'],null, ['id'=>'activo','class' => 'form-control'])!!}
                        </div>
					</div>
                    <div class="form-group row">
                        <label for="hora_salida" class="col-md-4 col-form-label text-md-right">Imagen destacada</label>
                        <div class="col-md-6">
                        {!!Form::file('imagen_destacada',['id'=>'imagen_destacada','class'=>'form-control'])!!}
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