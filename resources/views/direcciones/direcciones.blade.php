@extends('layouts.principal')

@section('contenido')	

<h1>
  @foreach($local as $locales)
    {{$locales->id}}
    <small>{{$locales->nombre}}</small>
  @endforeach
</h1>
<ol class="breadcrumb">
  <li>{!!link_to_route('locales.index', $title = 'Locales', $parameters = "", $attributes = ['class'=>'']);!!}</li>
  <li class="active">Direcciones</li>
</ol>

<div class="box-header with-border">
  {!!link_to_route('direcciones.create', $title = 'Agregar Direccion', "local=".$parameters = $locales->id, $attributes = ['class'=>'glyphicon glyphicon-plus']);!!}
</div>
  @if(Session::has('message'))
  <?php $message=Session::get('message') ?>
    <div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    {{Session::get('message')}}
    </div>
  @endif
<!-- Main content -->
<table id="example2" class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>Local</th>
      <th>pais</th>
      <th>estado</th>
      <th>municipio</th>
      <th>cp</th>
      <th>calle</th>
      <th>numero</th>
      <th>referencia</th>
    </tr>
  </thead>
  <tbody>
    @foreach($direccion as $direcciones)
    <tr>
      <td>{{$direcciones->locales_id}}</td>
      <td>{{$direcciones->pais_id}}</td>
      <td>{{$direcciones->estados_id}}</td>
      <td>{{$direcciones->municipios_id}}</td>
      <td>{{$direcciones->cp}}</td>
      <td>{{$direcciones->calle}}</td>
      <td>{{$direcciones->numero}}</td>
      <td>{{$direcciones->referencias}}</td>
      <td>
        <div class="btn-group">
          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="glyphicon glyphicon-option-horizontal"></span> 
          </button>
          <ul class="dropdown-menu">
            <li><a href="#" data-toggle="modal" data-target="#modal-default" class="glyphicon glyphicon-trash">Eliminar Direccion</a></li>
          </ul>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Eliminar horario</h4>
              </div>
              <div class="modal-body">
                <p>¿Deseas eliminar este horario?&hellip;</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
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
@endsection