@extends('layouts.principal')

@section('contenido')	
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>  

<h1>
  @foreach($local as $locales)
    {{$locales->id}}
    <small>{{$locales->nombre}}</small>
  @endforeach
</h1>
<ol class="breadcrumb">
  <li>{!!link_to_route('locales.index', $title = 'Locales', $parameters = "", $attributes = ['class'=>'']);!!}</li>
  <li class="active">Comidas</li>
</ol>

  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal1">
  	<span class="glyphicon glyphicon-plus"></span>
  	Agregar comida
  </button>

  @if(Session::has('message'))
  <?php $message=Session::get('message') ?>
    <div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    {{Session::get('message')}}
    </div>
  @endif
 <!-- Modal -->
 <div class="modal fade" id="exampleModal1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                {!!Form::open(['route'=>'comidas.store', 'method'=>'POST', 'enctype'=>'multipart/form-data'])!!}
                @foreach($local as $locals)
                  {!!Form::hidden('locales_id',$locals->id,['id'=>'locales_id','class'=>'form-control','placeholder'=>'Locales id','required'=>'required','autofocus'=>'autofocus'])!!}
                @endforeach
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Agregar horario</h4>
                {!!Form::open(['route'=>'horarios.store', 'method'=>'POST', 'enctype'=>'multipart/form-data'])!!}
                @foreach($local as $locales)
                  {!!Form::hidden('locales_id',$locales->id,['id'=>'locales_id','class'=>'form-control','placeholder'=>'local','required'=>'required','autofocus'=>'autofocus'])!!}
                @endforeach
            </div>
            <div class="modal-body">

              <div class="form-group row">
              <label class="col-md-4 col-form-label text-md-right" for="dia">Nombre</label>
                <div class="col-md-6">
                  {!!Form::text('nombre',null,['id'=>'nombre','class'=>'form-control','placeholder'=>'Nombre de la comida','required'=>'required','autofocus'=>'autofocus'])!!}
                </div>
              </div>
              
              <div class="form-group row">
              <label class="col-md-4 col-form-label text-md-right" for="dia">Descripción</label>
                <div class="col-md-6">
                  {!!Form::text('descripcion',null,['id'=>'descripcion','class'=>'form-control','placeholder'=>'Descripción','required'=>'required','autofocus'=>'autofocus'])!!}
                </div>
              </div>

              <div class="form-group row">
              <label class="col-md-4 col-form-label text-md-right" for="dia">Precio</label>
                <div class="col-md-6">
                  {!!Form::text('precio',null,['id'=>'precio','class'=>'form-control','placeholder'=>'Precio de la comida','required'=>'required','autofocus'=>'autofocus'])!!}
                </div>
              </div>

              <div class="form-group row">
              <label class="col-md-4 col-form-label text-md-right" for="dia">Categoría</label>
                <div class="col-md-6">
                  {!!Form::text('categorias_id',null,['id'=>'categoria','class'=>'typeahead form-control','placeholder'=>'Nombre de la categoría','required'=>'required','autofocus'=>'autofocus'])!!}
                </div>
              </div>

              <div class="form-group row">
              <label class="col-md-4 col-form-label text-md-right" for="dia">Imagen</label>
                <div class="col-md-6">
                  {!!Form::file('foto_comida',['id'=>'foto','class'=>'form-control'])!!}
                </div>
              </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                
                {!!Form::submit('Agregar comida',['class'=>'btn btn-primary'])!!}
                {!!Form::close()!!}
            </div>
        </div>
    </div>
</div>
<!-- /.modal --> 

                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr>
				      <th>id comida</th>
				      <th>categoria id</th>
				      <th>nombre</th>
				      <th>descripcion</th>
				      <th>precio</th>
				    </tr>
				  </thead>
				  @foreach($comida as $comidas)
				  <tbody>
				    <tr>
				      <td>{{$comidas->id}}</td>
				      <td>{{$comidas->categorias_id}}</td>
				      <td>{{$comidas->nombre}}</td>
				      <td>{{$comidas->descripcion}}</td>
				      <td>{{$comidas->precio}}</td>
				        
				      <td>
				      	<div class="btn-group">
                          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="glyphicon glyphicon-option-horizontal"></span> 
                          </button>
                          <ul class="dropdown-menu">
                            <li>
                              {!!link_to_route('ingredientes.show', $title = 'Ingredientes', $parameters = $comidas->id, $attributes = ['class'=>'glyphicon glyphicon-glass']);!!}
                            </li>
                            <li><a href="#" data-toggle="modal" data-target="#modal-default" class="glyphicon glyphicon-trash">Eliminar comida</a></li>
                          </ul>
                        </div> 
					    <!-- Modal -->
                        <div class="modal fade" id="modal-default">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Eliminar comida</h4>
                              </div>
                              <div class="modal-body">
                                <p>¿Deseas eliminar esta comida?&hellip;</p>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                                {!!Form::open(['route'=>['comidas.destroy',$comidas->id],'method'=>'DELETE'])!!}
					                {!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
					              {!!Form::close()!!}
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- /.modal --> 
					  </td>
					</tr>
				  </tbody>
				 @endforeach 
			   </table>
 
<script type="text/javascript">
    var path = "{{ route('autocomplete') }}";
    $('input.typeahead').typeahead({
        source:  function (query, process) {
        return $.get(path, { query: query }, function (data) {
                return process(data);
            });
        }
    });
</script>
@endsection