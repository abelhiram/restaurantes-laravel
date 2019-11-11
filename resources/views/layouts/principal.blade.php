
<html>
<head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Holtec</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/dist/css/AdminLTE.min.css">

  <link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/dist/css/skins/_all-skins.min.css">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  

</head>
@guest
<script type="text/javascript">
    window.location = "{{ Auth::check() ? url('/') : url('/login') }}";
</script>
@if (Route::has('register'))
@endif
  @else
<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">
  <header class="main-header">
  
    <!-- Logo -->
    <a href="{{ Auth::check() ? url('/') : url('/login') }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>Chis</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Achichinlito</b></span>
    </a>
    <nav class="navbar navbar-static-top">
      <!-- Sidebar izquierda mostrar-ocultar-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="glyphicon glyphicon-th-list"></span>
      </a>
    <!-- Navegación del header -->
    <nav class="navbar navbar-static-top">
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <li class="dropdown messages-menu">
            <a class="active-tab" href="{{ url('/') }}">Inicio</a>
          </li>     
          <li class="dropdown messages-menu">
            <a class="active-tab" href="{{ url('usuarios') }}">Usuarios</a>
          </li>  
          <li class="dropdown messages-menu">
            <a class="active-tab" href="{{ url('locales') }}">Locales</a>
          </li>       
          <li class="dropdown messages-menu">
            <a class="active-tab" href="{{ url('categorias') }}">Categorias</a>
          </li>
          
          <!-- Menú de usuario -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="http://assets.stickpng.com/thumbs/585e4beacb11b227491c3399.png" class="user-image" alt="User Image">
              <span class="hidden-xs">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- Imagen -->
              <li class="user-header">
                <img src="http://assets.stickpng.com/thumbs/585e4beacb11b227491c3399.png" class="img-circle" alt="User Image">

                <p>
                {{ Auth::user()->name }}
                </p>
              </li>
              <!-- Contenido de la cuenta "opciones" -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Opcion 1</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Opcion 2</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Opcion 3</a>
                  </div>
                </div>
              </li>
              <!-- Opciones de administracióin y deslogueo-->
              <li class="user-footer">
                <div class="pull-left">
                <a href="{{ url('register') }}" class="btn btn-default btn-flat">Registrar admin</a>
                </div>
                <div class="pull-right">
                <a class="btn btn-default btn-flat" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    {{ __('Cerrar sesión') }}

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                  </a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control del sidebar de la derecha -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="glyphicon glyphicon-th"></i></a>
          </li>  
        </ul>
      </div>
    </nav>
              <!-- Fin del header -->
  </header>

  <!-- =============================================== -->

  <!-- Sidebarr izquierda principal -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="http://assets.stickpng.com/thumbs/585e4beacb11b227491c3399.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Usuario</p>
          <a href="#"><i class="glyphicon glyphicon-off"></i> Online</a>
        </div>
      </div>
      <!--  buscar
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Buscar...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="glyphicon glyphicon-search"></i>
                </button>
              </span>
        </div>
      </form>
      -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">

        <li class="header">Contenido de la página</li>
        <li class="treeview active">
          <a href="#">
            <i class="glyphicon glyphicon-home"></i> <span>Inicio</span>
            <span class="pull-right-container">
              <i class="glyphicon glyphicon-chevron-down"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="dropdown messages-menu">
	          <a class="active-tab" href="{{ url('/') }}">Inicio</a>
	        </li>     
	        <li class="dropdown messages-menu">
	          <a class="active-tab" href="{{ url('usuarios') }}">Usuarios</a>
	        </li>  
	        <li class="dropdown messages-menu">
	          <a class="active-tab" href="{{ url('locales') }}">Locales</a>
	        </li>       
	        <li class="dropdown messages-menu">
	          <a class="active-tab" href="{{ url('categorias') }}">Categorias</a>
	        </li>
          <li class="dropdown messages-menu">
	          <a class="active-tab" href="{{ url('register') }}">Registrar</a>
	        </li>
          </ul>
        </li>   
      </ul>
    </section>
    <!-- /.sidebar izquierda -->
  </aside>
  <div class="content-wrapper">

  <!-- =============================================== -->
  <!-- Contenido de la página -->
  <section class="content">
      <div class="box">
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-body">
                  @section('contenido') 
                    @show
                  @yield('otrocontenido') 
                </div>
              </div>
            </div> 
          </div> 
        </section> 
      </div>  
    </section> 
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>
  </div>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>

      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
	  <!-- jQuery 3 -->
	<script src="https://adminlte.io/themes/AdminLTE/bower_components/jquery/dist/jquery.min.js"></script>
	<!-- Bootstrap 3.3.7 -->
	<script src="https://adminlte.io/themes/AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<!-- FastClick -->
	<script src="https://adminlte.io/themes/AdminLTE/bower_components/fastclick/lib/fastclick.js"></script>

	<script src="https://adminlte.io/themes/AdminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="https://adminlte.io/themes/AdminLTE/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

	<!-- AdminLTE App -->
	<script src="https://adminlte.io/themes/AdminLTE/dist/js/adminlte.min.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="https://adminlte.io/themes/AdminLTE/dist/js/demo.js"></script>
	<!-- SlimScroll -->
	<script src="https://adminlte.io/themes/AdminLTE/bower_components/jquery-slimscroll/jquery.slimscroll.min.js">
	
	</script>

	<script>
	  $(document).ready(function () {
	    $('.sidebar-menu').tree()
	  })
	</script>
  </body>
  @endguest
</html>