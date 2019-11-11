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
    <li class="active">Horarios</li>
  </ol>

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal1">
          <span class="glyphicon glyphicon-plus"></span>
              Agregar horario
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
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Agregar horario</h4>
                {!!Form::open(['route'=>'horarios.store', 'method'=>'POST', 'enctype'=>'multipart/form-data'])!!}
                @foreach($local as $locales)
                  {!!Form::hidden('locales_id',$locales->id,['id'=>'locales_id','class'=>'form-control','placeholder'=>'local','required'=>'required','autofocus'=>'autofocus'])!!}
                @endforeach
            </div>
            <div class="modal-body">
              <div class="input-group col-md-12">
                <div class="col-md-6">
                  <label class="input-group-text" for="dia">Dia</label>
                  {!!Form::select('dia',['L' => 'Lunes','M'=>'Martes','MI' => 'Miercoles','J' => 'Jueves','V' => 'Viernes','S' => 'Sabado','D' => 'Domingo'],null, ['id'=>'dia','class' => 'form-control'])!!}
                </div>
                
              </div>
              <div class="input-group col-md-12">
                  <div class="col-md-6">
                  <label class="input-group-text" for="hora_apertura">Desde</label>
                    {!! Form::time('hora_apertura','00:00', ['class' => 'form-control']) !!}
                  </div>
                  <div class="col-md-6">
                  <label class="input-group-text" for="hora_cierre">Hasta</label>
                    {!! Form::time('hora_cierre','00:00', ['class' => 'form-control']) !!}
                  </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                
                {!!Form::submit('Agregar horario',['class'=>'btn btn-primary'])!!}
                {!!Form::close()!!}
            </div>
        </div>
    </div>
</div>
<!-- /.modal -->  
<!-- Main content -->
<table id="example2" class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>Día</th>
      <th>Apertura</th>
      <th>Cierre</th>
      <th>Opciones</th>
    </tr>
  </thead>
  <tbody>
    @foreach($horario as $horarios)
    <tr>
      <td>{{$horarios->dia}}</td>
      <td>{{$horarios->hora_apertura}}</td>
      <td>{{$horarios->hora_cierre}}</td>
      <td>
        <div class="btn-group">
          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="glyphicon glyphicon-option-horizontal"></span> 
          </button>
          <ul class="dropdown-menu">
            <li><a href="#" data-toggle="modal" data-target="#modal-default" class="glyphicon glyphicon-trash">Eliminar</a></li>
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
                {!!Form::open(['route'=>['horarios.destroy',$horarios->id],'method'=>'DELETE'])!!}
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
 
@endsection