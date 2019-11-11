@extends('layouts.principal')

@section('contenido')	
<section class="content-header">
  <h1>
    Categorías
    <small>Tabla de categorías</small>
  </h1>
</section>

      <div class="box-header with-border">
      </div>
        {!!Form::open(['route'=>'categorias.store', 'method'=>'POST', 'enctype'=>'multipart/form-data'])!!}
          {!!Form::text('nombre',null,['id'=>'nombre','class'=>'form-control','placeholder'=>'Nombre de la categoría','required'=>'required','autofocus'=>'autofocus'])!!}
          {!!Form::submit('Agregar categoría',['class'=>'btn btn-primary btn-block'])!!}
        {!!Form::close()!!}  
      
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
                          <th>Id categoria</th>
                          <th>Nombre de la categoria</th>
                          <th>Opciones</th>
                        </tr>
                      </thead>
                      @foreach($categoria as $categorias)
                      <tbody>
                        <tr>
                          <td>{{$categorias->id}}</td>
                          <td>{{$categorias->nombre}}</td>
                          <td>
                          <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="glyphicon glyphicon-option-horizontal"></span> 
                            </button>
                            <ul class="dropdown-menu">
                              <li><a href="#" class="glyphicon glyphicon-trash" data-toggle="modal" data-target="#exampleModal">Eliminar</a></li>
                              <li role="separator" class="divider"></li>
                              <li><a href="#"></a></li>
                            </ul>
                          </div>  
                          	
                        		<!-- Modal -->
                        		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        		  <div class="modal-dialog" role="document">
                        		    <div class="modal-content">
                        		      <div class="modal-header">
                        		        <h5 class="modal-title" id="exampleModalLabel">Eliminar categoría</h5>
                        		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        		          <span aria-hidden="true">&times;</span>
                        		        </button>
                        		      </div>
                        		      <div class="modal-body">
                        		        ¿Deseas eliminar esta categoría?
                        		      </div>
                        		      <div class="modal-footer">
                        		        {!!Form::open(['route'=>['categorias.destroy',$categorias->id],'method'=>'DELETE'])!!}
                        				{!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
                        				{!!Form::close()!!}
                        		      </div>
                        		    </div>
                        		  </div>
                        		</div>
                          <!-- fin del Modal -->
                          </td>
                        </tr>
                      </tbody>  	
                      @endforeach 
                    </table>
                      {!!$categoria->render()!!}

@endsection











