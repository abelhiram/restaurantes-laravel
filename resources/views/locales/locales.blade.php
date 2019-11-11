@extends('layouts.principal')

@section('contenido')	
<section class="content-header">
  <h1>
    Locales
    <small>Tabla de locales</small>
  </h1>
</section>
<div class="box-header with-border">
{!!link_to_route('crear_locales', $title = 'Crear local', $parameters = '', $attributes = ['id'=>'btncre','class'=>'btn btn-primary']);!!}
</div>
@if(Session::has('message'))
  <?php $message=Session::get('message') ?>
  <div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    {{Session::get('message')}}
  </div>
@endif

  <table id="example2" class="table table-bordered table-hover">
    <thead>
      <tr>
         <th>ID local</th>
        <th>ID usuario</th>
        <th>Nombre del local</th>
        <th>Imagen destacada</th>
        <th>Estatus</th>
        <th>Opciones</th>
      </tr>
    </thead>
    @foreach($local as $locals)
    <tbody>
      <tr>
        <td>{{$locals->id}}</td>
        <td>{{$locals->usuario_id}}</td>
        <td>{{$locals->nombre}}</td>
        <td>{{$locals->imagen_destacada}}</td>
        <td>{{$locals->activo}}</td>
        <td>
          <div class="btn-group">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="glyphicon glyphicon-option-horizontal"></span> 
            </button>
            <ul class="dropdown-menu">
              <li>
                {!!link_to_route('horarios.show', $title = 'Horarios', $parameters = $locals->id, $attributes = ['class'=>'glyphicon glyphicon-calendar']);!!}
              </li>
              <li>
                {!!link_to_route('comidas.show', $title = 'Comidas', $parameters = $locals->id, $attributes = ['class'=>'glyphicon glyphicon-apple']);!!}
              </li>
              <li>
                {!!link_to_route('direcciones.show', $title = 'Direcciones', $parameters = $locals->id, $attributes = ['class'=>'glyphicon glyphicon-road']);!!}
              </li>
              <li role="separator" class="divider"></li>
              <li>{!!link_to_route('locales.edit', $title = 'Modificar', $parameters = $locals->id, $attributes = ['class'=>'glyphicon glyphicon-pencil']);!!}
              </li>

              <li>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Eliminar local</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        ¿Deseas eliminar esta local?
                      </div>
                      <div class="modal-footer">
                        {!!Form::open(['route'=>['locales.destroy',$locals->id],'method'=>'DELETE'])!!}
                    {!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
                    {!!Form::close()!!}
                      </div>
                    </div>
                  </div>
                </div>
              </li>
            </ul>
          </div> 
        </td>
      </tr>
    </tbody>
    @endforeach 
  </table>      
  {!!$local->render()!!}
                  
@endsection