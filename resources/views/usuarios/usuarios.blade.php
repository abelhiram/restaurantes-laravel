@extends('layouts.principal')

@section('contenido') 
<section class="content-header">
  <h1>
    Usuarios
    <small>Tabla de usuarios</small>
  </h1>
</section>
<div class="box-header with-border">
{!!link_to_route('crear_usuario', $title = ' Crear usuario', $parameters = '', $attributes = ['class'=>'glyphicon glyphicon-plus btn ']);!!}  
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
        <th>ID</th>
        <th>nombre</th>
        <th>apellidos</th>
        <th>correo</th> 
        <th>teléfono</th>
        <th>genero</th>
        <th>rol</th>
        <th>nombre comercial</th>
        <th>opciones</th>
      </tr>
    </thead>  
    <tbody>
      @foreach($usuario as $usuarios)
      <tr>  
        <td>{{$usuarios->id}}</td>
        <td>{{$usuarios->nombre}}</td>
        <td>{{$usuarios->apellidos}}</td>
        <td>{{$usuarios->correo}}</td>
        <td>{{$usuarios->telefono}}</td> 
        <td>{{$usuarios->genero}}</td>
        <td>{{$usuarios->rol}}</td>
        <td>{{$usuarios->nombre_comercial}}</td>
        <td>
          <div class="btn-group">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="glyphicon glyphicon-option-horizontal"></span> 
            </button>
            <ul class="dropdown-menu">
              <li>{!!link_to_route('usuarios.edit', $title = 'Modificar', $parameters = $usuarios->id, $attributes = ['class'=>'glyphicon glyphicon-pencil']);!!}</li>
              <li role="separator" class="divider"></li>
              <li><a href="#"></a></li>
            </ul>
          </div>                          
        </td>
      </tr>
       @endforeach 
    </tbody>
  </table>
  {!!$usuario->render()!!}
                 
@endsection
