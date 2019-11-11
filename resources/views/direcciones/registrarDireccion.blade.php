@extends('layouts.principal')

@section('contenido') 
  {!! Html::script('js/jquery-2.1.0.min.js') !!}

  <h1>
  {!!Form::label('localid',Request::get('local'))!!}
  @foreach($local as $locales)
    {{$locales->id}}
    <small>{{$locales->nombre}}</small>
  @endforeach
</h1>
<ol class="breadcrumb">
  <li>{!!link_to_route('direcciones.show', $title = 'Direcciones', $parameters = Request::get('local'), $attributes = ['class'=>'']);!!}</li>
  <li class="active">Registrar dirección</li>
</ol>
      {!!Form::open(['route'=>'direcciones.store', 'method'=>'POST', 'enctype'=>'multipart/form-data'])!!}
      <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <label>mapa</label>
              <!--<input type="text" id="searchmap" name="searchmap">-->
              <input id="pac-input" class="controls" type="text" placeholder="escribe algo" name="">
            </div>
            <div class="modal-body">
              

              {!!Form::text('lat',null,['id'=>'lat','class'=>'','placeholder'=>'latitud'])!!}

              {!!Form::text('lng',null,['id'=>'lng','class'=>'','placeholder'=>'longitud'])!!}
            </div>
            <div class="modal-footer">

              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" data-dismiss="modal">Save changes</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
  <div class="container">

        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body">
                    {!!Form::text('locales_id',Request::get('local'),['id'=>'locales_id','style'=>'display:none;','class'=>'form-control','placeholder'=>'Locales id','required'=>'required','autofocus'=>'autofocus'])!!}
                <div class="col-xs-4">
                  <label for="pais">Pais</label>
                  {!!Form::select('pais',$pais->pluck('nombre'),null, ['id'=>'pais','class' => 'form-control','required'=>'required'])!!}
                </div>
                <div class="col-xs-4">
                  <label for="state">Estado</label>
                  {!!Form::select('estado',$estado->pluck('nombre'),null, ['id'=>'state','class' => 'form-control','required'=>'required'])!!}
                </div>
                <div class="col-xs-4">
                  <label for="town">Municipio</label>
                  <select name="town" id="town" class="form-control"></select>
                </div>
                <div class="col-xs-3">
                  <label for="cp">CP</label>
                {!!Form::text('cp',null,['id'=>'cp','class'=>'form-control','placeholder'=>'Código postal','required'=>'required','autofocus'=>'autofocus'])!!}
                </div>
                <div class="col-xs-9">
                  <label for="calle">Dirección</label>
                {!!Form::text('calle',null,['id'=>'calle','class'=>'form-control','placeholder'=>'Dirección','required'=>'required','autofocus'=>'autofocus'])!!}
                </div>
                <div class="col-xs-3">
                 <label for="numero">Número</label>
                {!!Form::text('numero',null,['id'=>'numero','class'=>'form-control','placeholder'=>'Número','required'=>'required','autofocus'=>'autofocus'])!!}
                </div>
                <div class="col-xs-9">
                  <label for="entre_calles">Entre calles</label>
                {!!Form::text('entre_calles',null,['id'=>'entre_calles','class'=>'form-control','placeholder'=>'Entre calles','required'=>'required','autofocus'=>'autofocus'])!!}
                </div>
                <div class="col-xs-12">
                  <label for="referencias">Referencias</label>
                {!!Form::text('referencias',null,['id'=>'referencias','class'=>'form-control','placeholder'=>'Referencias','required'=>'required','autofocus'=>'autofocus'])!!}
                </div>
                <div class="col-xs-4"><br>
                  <button type="button" id="mapa" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                    Mostrar mapa
                  </button>
                  {!!Form::submit('Registrar',['class'=>'btn btn-primary btn-block'])!!}
                  {!!Form::close()!!}
                </div>
                </div>
                </div>
               
                </div>
                <div class="col-md-4">
            <div id="map"></div>
            </div>




  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCLeZGPhJdYC8N74d28z5LzRLASIFwuvcU&callback=initMap"
    async defer></script>
  <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
  
  <script>
    var map;
    function initMap() {
      map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: 27.0489509, lng: -109.4526592},
        zoom: 16
      });
      var marker = new google.maps.Marker({
        position: {
          lat: 27.0489509, 
          lng: -109.4526592
        },
        map: map,
         draggable: true
       }); 
    }

    google.maps.event.addDomListener(window,'load',initialize);

      var defaultBounds = new google.maps.LatLngBounds(
        new google.maps.LatLng(-33.8902, 151.1759),
        new google.maps.LatLng(-33.8474, 151.2631));
      var options = {
        bounds: defaultBounds
      };
      var input = document.getElementById('pac-input');
      map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

      var autocomplete = new google.maps.places.Autocomplete(input,options);

  </script>
    
  <script>
  $('#state').change(function(){
    var paisID = $(this).val();
    if(paisID){
      $.ajax({
        type:"GET",
        url:"{{url('towns')}}/"+paisID,
        success:function(res){
          if(res){
            $("#town").empty();
            $.each(res,function(key,value){
              $("#town").append('<option value="'+key+'">'+value+'</option>');
            });
          }else{
            $("#town").empty();
          }
        }
      });
    }
  });
  </script>

  <style>
     #map {
      height: 50%;
    }
  </style>

  
@endsection

        
        
