@extends('layouts.principal')

@section('contenido')	
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>  

  <h1>
    @foreach($comida as $comidas)
      {{$comidas->id}}
      <small>{{$comidas->nombre}}</small>
    
  </h1>
  <ol class="breadcrumb">
    <li>{!!link_to_route('locales.index', $title = 'Locales', $parameters = "", $attributes = ['class'=>'']);!!}</li>
    <li>{!!link_to_route('comidas.show', $title = 'Comidas', $parameters = $comidas->locales_id, $attributes = ['class'=>'']);!!}</li>
    <li class="active">Ingredientes</li>
  </ol>
    @endforeach


      <div class="box-header with-border">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal1">
          <span class="glyphicon glyphicon-plus"></span>
          Agregar ingrediente
        </button>
      </div>
        @if(Session::has('message'))
        <?php $message=Session::get('message') ?>
          <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          {{Session::get('message')}}
          </div>
        @endif
  <!-- Modal -->
      <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel1">Agregar ingrediente</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              {!!Form::open(['route'=>'ingredientes.store', 'method'=>'POST', 'enctype'=>'multipart/form-data'])!!}
                @foreach($comida as $comidas)
              {!!Form::hidden('comidas_id',$comidas->id,['id'=>'comidas_id','class'=>'form-control','placeholder'=>'comidas id','required'=>'required','autofocus'=>'autofocus'])!!}
                @endforeach

            <div class="form-group row">
              <label class="col-md-4 col-form-label text-md-right" for="dia">Nombre del ingrediente</label>
              <div class="col-md-6">
              {!!Form::text('nombre',null,['id'=>'nombre','class'=>'form-control','placeholder'=>'ingrediente','required'=>'required','autofocus'=>'autofocus'])!!}
              </div>
            </div> 
            <div class="form-group row">
              <label class="col-md-4 col-form-label text-md-right" for="dia">Precio</label>
              <div class="col-md-6">
              {!!Form::text('precio',null,['id'=>'precio','class'=>'form-control','placeholder'=>'precio','required'=>'required','autofocus'=>'autofocus'])!!}
              </div>
            </div>

            </div>
              <div class="modal-footer">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
              {!!Form::submit('Agregar ingrediente',['class'=>'btn btn-primary'])!!}
              {!!Form::close()!!}
            </div>
          </div>
        </div>
      </div>

                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>comidas id</th>
                      <th>nombre</th>
                      <th>precio</th>
                      <th>opciones</th>
                    </tr>
                  </thead>
                    @foreach($ingrediente as $ingredientes)
                  <tbody>
                    <tr>
                      <td>{{$ingredientes->id}}</td>
                      <td>{{$ingredientes->comidas_id}}</td>
                      <td>{{$ingredientes->nombre}}</td>
                      <td>{{$ingredientes->precio}}</td>
                      <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="glyphicon glyphicon-option-horizontal"></span> 
                          </button>
                          <ul class="dropdown-menu">
                            <li><a href="#" data-toggle="modal" data-target="#modal-default" class="glyphicon glyphicon-trash">Eliminar ingrediente</a></li>
                          </ul>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="modal-default">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Eliminar ingrediente</h4>
                              </div>
                              <div class="modal-body">
                                <p>¿Deseas eliminar este ingrediente?&hellip;</p>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                                {!!Form::open(['route'=>['ingredientes.destroy',$ingredientes->id],'method'=>'DELETE'])!!}
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