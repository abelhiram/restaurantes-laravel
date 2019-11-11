@extends('layouts.principal')

@section('contenido')	
<h3>Modificar local</h3>
<ol class="breadcrumb">
  <li>{!!link_to_route('locales.index', $title = 'Locales', $parameters = "", $attributes = ['class'=>'']);!!}</li>
  <li class="active">Modificar local</li>
</ol>
  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"></div>
                	  <div class="card-body">
                        <div class="form-group row" style="margin-top:15px;">
                            <div class="col-md-6">
                            {!!Form::model($local,['route'=>['locales.update',$local->id],'method'=>'PUT', 'class'=>''])!!}
                            </div>
						            </div>
                        <div class="form-group row" style="display:none;">
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
								            {!!Form::submit('Modificar local',['class'=>'btn btn-primary'])!!}
                            <button type="button" class="btn btn-default" data-toggle="modal"  data-target="#exampleModall">
                              Eliminar local
                            </button>
                            {!!Form::close()!!}
                            </div>
					  	          </div>
					        </div>
				      </div>
			    </div>
		  </div>
	</div>
        <!-- Modal -->
  <div class="modal fade" id="exampleModall" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabell" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabell">Eliminar Local</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                ¿Deseas eliminar este Local?
              </div>
              <div class="modal-footer">
                {!!Form::open(['route'=>['locales.destroy',$local->id],'method'=>'DELETE'])!!}
                {!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
                {!!Form::close()!!}
              </div>
          </div>
      </div>
  </div>

@endsection