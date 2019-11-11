@extends('layouts.principal')

@section('contenido') 
    <section class="content-header">
      <h1>
        Data Tables
        <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Hover Data Table</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Apellidos</th>
                  <th>correo</th> 
                  <th>telefono</th>
                  <th>genero</th>
                  <th>rol</th>
                  <th>nombre comercial</th>
                </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>{{$usuarios->id}}</td>
                  </tr>
                  <tr>
                    <td>{{$usuarios->nombre}}</td>
                  </tr>
                  <tr>
                    <td>{{$usuarios->apellidos}}</td>
                  </tr>
                  <tr>
                    <td>{{$usuarios->correo}}</td>
                  </tr>
                  <tr>  
                    <td>{{$usuarios->telefono}}</td>
                  </tr>
                  <tr>  
                    <td>{{$usuarios->genero}}</td>
                  </tr>
                  <tr>
                    <td>{{$usuarios->rol}}</td>
                  </tr>
                  <tr>
                    <td>{{$usuarios->nombre_comercial}}</td>
                  </tr>
                  <tfoot>
                  <tr>
                    <th>ID</th>
                  <th>Nombre</th>
                  <th>Apellidos</th>
                  <th>correo</th> 
                  <th>telefono</th>
                  <th>genero</th>
                  <th>rol</th>
                  <th>nombre comercial</th>
                  </tr>
                  </tfoot>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection