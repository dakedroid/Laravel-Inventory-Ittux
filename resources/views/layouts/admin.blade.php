<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistema de Inventario</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{asset ('css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset ('css/font-awesome.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset ('css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset ('css/_all-skins.min.css')}}">
    <link rel="apple-touch-icon" href="{{asset ('img/apple-touch-icon.png')}}">
    <link rel="shortcut icon" href="{{asset ('img/favicon.ico')}}">

  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">

        <!-- Logo -->
        <a href="#" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>S.A</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Sistema Almacen</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">NavegaciÃ³n</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->

              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <small >Cerrar Sesion: {{ Auth::user()->name }}</small>
                  <span class="hidden-xs"></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">

                    <p>
                    Usuario: <br>    {{ Auth::user()->name }}

                      <small><div class="" align="center">
                          <img   align="center" class="img-responsive" src="{{asset ('img/ico-user.png')}}" width="90" height="90">
                      </div></small>
                    </p>
                  </li>

                  <!-- Menu Footer-->
                  <li class="user-footer">

                    <li class="dropdown">

                                <a href="{{ url('/logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Cerrar Sesión
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                  </li>
                </ul>
              </li>

            </ul>
          </div>

        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->

          <!-- sidebar menu: : style can be found in sidebar.less

        -->
          <ul class="sidebar-menu">


            <li class="treeview">
              <a href="{{url('almacen/inventario')}}">
                <i class="fa fa-laptop"></i>
                <span>Almacen</span>

              </a>

            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Altas</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                  <li><a href="{{url('almacen/inventario/create')}}"><i class="fa fa-circle-o"></i> Agregar articulos</a></li>
                <li><a href="{{url('almacen/historial_altas')}}"><i class="fa fa-circle-o"></i> Historial</a></li>

              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Salidas</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                  <li><a href="{{url('almacen/salidas')}}"><i class="fa fa-circle-o"></i> Realizar salida a Depto</a></li>
                  <li><a href="{{url('almacen/salidas_prestamo')}}"><i class="fa fa-circle-o"></i> Realizar prestamo</a></li>
                  <li><a href="{{url('almacen/historial_salida')}}"><i class="fa fa-circle-o"></i> Historial</a></li>


              </ul>
            </li>

            <li class="treeview">
              <a href="{{url('almacen/carrito')}}">
                <i class="fa fa-shopping-cart"></i>
                <span>Carrito</span>

              </a>

            </li>

            <li class="treeview">
              <a href="{{url('almacen/prestamo')}}">
                <i class="fa fa-th"></i>
                <span>Articulos Prestados</span>

              </a>

            </li>




            <li class="treeview">
              <a href="#">
                <i class="fa fa-folder"></i> <span>Acceso</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('almacen/usuario/create')}}"><i class="fa fa-circle-o"></i> Nuevo Usuarios</a></li>
                <li><a href="{{url('almacen/usuario')}}"><i class="fa fa-circle-o"></i>Listado de Usuarios</a></li>

              </ul>
            </li>
             <li>
              <a href="{{url('almacen/ayuda')}}">
                <i class="fa fa-plus-square"></i> <span>Ayuda</span>
              </a>
            </li>
            <li>
              <a href="{{url('almacen/acercade')}}">
                <i class="fa fa-info-circle"></i> <span>Acerca De...</span>
              </a>
            </li>

          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>





       <!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">

          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="logo-lg"><b><a href="#"></a></b></h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  	<div class="row">
	                  	<div class="col-md-12">
		                          <!--Contenido-->
                              @yield('contenido')
		                          <!--Fin Contenido-->
                           </div>
                        </div>

                  		</div>
                  	</div><!-- /.row -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <!--Fin-Contenido-->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0.0
        </div>
        <strong>Copyright &copy; 2017-2020 <a href="#">ISC</a>.</strong> All rights reserved.
      </footer>


    <!-- jQuery 2.1.4 -->
    <script src="{{asset ('js/jQuery-2.1.4.min.js')}}"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{asset ('js/bootstrap.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset ('js/app.min.js')}}"></script>

  </body>
</html>
