@extends('layouts.principal')
<title>Pagina de inicio</title>
@section('contenido')	  
  <!-- Header -->
    
<div class="jumbotron bg-primary">
        <div class="container bg-primary">
          <h1 class="display-3 bg-primary">El Achichinclito</h1>
          <p>No somos una copia del Achichincle.</p>
          <p><a class="btn btn-primary btn-lg" href="#" role="button">¿Como iniciar?</a></p>
        </div>
      </div>
<br>
  <!-- Page Content -->
  <div class="container">

    <div class="row">
      <div class="col-md-8 mb-5">
        <h2>¿ Tienes alguna duda ?</h2>
        <hr>
        <p> En la holltec tenemos como prioridad la satisfacción de nuestros usuarios. Para alcanzar este objetivo, sera de gran ayuda que usted aclare todas sus dudas </p> 
       
        <a class="btn btn-primary btn-lg" href="#">ayudanos</a>
      </div>
      <div class="col-md-4 mb-5">
        <h2>Contactanos</h2>
        <hr>
        <address>
          <strong>Direccion</strong>
          <br>calle del rio 4985
          <br>entre cuarta y quinta
          <br>
        </address>
        <address>
          <abbr title="Phone">P:</abbr>
          6421347038
          <br>
          <abbr title="Email">E:</abbr>
          <a href="mailto:#">holltec@gmail</a>
        </address>
      </div>
    </div>

  </div>
   <br>
   <br>
   <br>
   <hr>
 <div class="container mt-5">
        <!-- Example row of columns -->
        <div class="row">
          <div class="col-md-4">
            <h2>Ver tus usuarios</h2>
            <p>Los usuarios son todos aquellos clientes que tienes agredadosy tienen derecho a modificar un local.</p>
            <a href="{{ url('usuarios') }}" class="btn btn-primary">Usuarios</a>
          </div>
          <div class="col-md-4">
            <h2>Ver tus locales</h2>
            <p>Los locales son los que tienen vinculado un usuario y en estos locales se puede modificar la comida que se vendera. </p>
            <a href="{{ url('locales') }}" class="btn btn-primary">Locales</a>
          </div>
          <div class="col-md-4">
            <h2>Ver tus categorias</h2>
            <p>son todas las categorias de comida que estan enlazadas a un local, estas funcionaran como un referente a la hora de organizar la comida.</p>
            <a href="{{ url('categorias') }}" class="btn btn-primary">categorias</a>
          </div>
        </div>

  

      </div>



 


  <!-- /.container -->


@endsection


