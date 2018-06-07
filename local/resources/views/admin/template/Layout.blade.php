<!DOCTYPE html>

<html lang="en">

  <head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

     <link rel="shortcut icon" type="image/x-icon" href="{{asset('faviconMx.ico')}}">

    

    


    <title>@yield('title','Administracion')|Panel</title>

    <link rel="stylesheet"  href="{{asset('plugins/bootstrap/css/bootstrap.css')}}">

    <link rel="stylesheet"  href="{{asset('plugins/bootstrap/css/bootstrap-theme.min.css')}}">      

    <script  src="{{asset('plugins\jquery\jquery-3.1.0.js')}}" ></script>

    <script  src="{{asset('plugins\bootstrap\js\bootstrap.js')}}" ></script>



  <!-- Datepicker Files -->

    

    <link rel="stylesheet" href="{{asset('plugins/datepicker/css/bootstrap-standalone.css')}}">

     <link rel="stylesheet" href="{{asset('plugins/datepicker/css/bootstrap-datepicker3.css')}}">

    <link rel="stylesheet" href="{{asset('plugins/chosen/chosen.css')}}">

    <script src="{{asset('plugins/datepicker/js/bootstrap-datepicker.js')}}"></script>

    <!-- Languaje -->

    <script src="{{asset('plugins/datepicker/locales/bootstrap-datepicker.es.min.js')}}"></script>

    <!--chosen-->

       
   

  </head>



  @if(Auth::user())

  <body >

  <img src="{{asset('img/logo.png')}}" ALIGN=LEFT class="col-xs-8 col-sm-4 col-md-4 col-lg-4">

    <br>  

      <div class="container"  ALIGN=Right>  

        <p >

          Usuario: {{Auth::user()->name }}

    <br>

      Fecha: <script type="text/javascript">

              var date = new Date();

              var d  = date.getDate();

              var day = (d < 10) ? '0' + d : d;

              var m = date.getMonth() + 1;

              var month = (m < 10) ? '0' + m : m;

              var yy = date.getYear();

              var year = (yy < 1000) ? yy + 1900 : yy;

              document.write(day + "/" + month + "/" + year);              

              </script>

    <br>

    

    

  <a href="{{ url('/logout') }}">Cerrar sesion</a>

 </p> 



<BR CLEAR=LEFT>



</div>

    

    <nav class="  navbar navbar-default" style="background-image: linear-gradient(to bottom,#d6d6d6 0,#d6d6d6 100%);" >

      <div class="container  " >

        <div class="navbar-header " >

          

            <button  type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">

            <img src= "{{asset('img/boton.png')}}">

            <span class="sr-only ">Toggle navigation</span>



          </button>

        </div>

        



        <div id="navbar" class="collapse navbar-collapse ColorLetraBar" >

          <ul class="nav navbar-nav" >

            <!--style="color:#465dd4; font-weight:bold;"-->

            <li><a href="{{route('admin.Eventos.agenda')}}">Consultar Agenda</a></li>

            

            

        







          <!--**************************************************************************-->

          <!--****************************Eventos***********************************-->

          <!--**************************************************************************-->



            <li class="dropdown  ">

              <a href="{{route('admin.Eventos.creacionfechas')}}" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Eventos<span class="caret "></span></a>

                <ul class="dropdown-menu">



                  <li><a href="{{route('admin.Eventos.index')}}" >Todos los eventos</a></li>

                  <li><a  href="{{route('admin.Eventos.creacionfechas')}}" >Generar evento</a></li>                  

                </ul>                

            </li>









          <!--**************************************************************************-->

          <!--****************************Inventario***********************************-->

          <!--**************************************************************************-->



            <li class="dropdown  ">

              <a href="#" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Inventario<span class="caret "></span></a>

                <ul class="dropdown-menu">

                  <li><a  href="{{route('admin.Inventarios.index')}}" >Todo el inventario</a></li>

                  <li><a href="{{route('admin.Inventarios.create')}}" >Añadir nuevo</a></li>

                </ul>                

            </li>





          <!--**************************************************************************-->

          <!--****************************Clientes***********************************-->

          <!--**************************************************************************-->



            <li class="dropdown  ">

              <a href="#" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Clientes<span class="caret "></span></a>

                <ul class="dropdown-menu">

                  <li><a  href="{{route('admin.Clientes.index')}}" >Todos los clientes</a></li>

                  <li><a href="{{route('admin.Clientes.create')}}" >Añadir nuevo</a></li>

                </ul>                

            </li>



          <!--**************************************************************************-->

          <!--****************************Intaladores***********************************-->

          <!--**************************************************************************-->



            <li class="dropdown">

              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Instaladores<span class="caret"></span></a>

                <ul class="dropdown-menu">

                  <li><a href="{{route('admin.Instaladores.index')}}" >Todos los instaladores</a></li>

                  <li><a href="{{route('admin.Instaladores.create')}}" >Añadir nuevo</a></li>

                </ul>                

            </li>



          <!--**************************************************************************-->

          <!--****************************Usuarios**************************************-->

          <!--**************************************************************************-->





            <li class="dropdown">

              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Usuarios<span class="caret"></span></a>

                <ul class="dropdown-menu">

                  <li><a href="{{route('admin.users.index')}}" >Todos los usuarios</a></li>

                  <li><a href="{{route('admin.users.create')}}" >Añadir nuevo</a></li>

                </ul>                

            </li>

            <!--*****************************************************************************-->



          </ul>

        </div><!--/.nav-collapse -->

      </div>





    </nav>

    



    <div class="container ">

    



    @include('flash::message')

     @endif

     

    @yield('contenedor')



    </div><!-- /.container -->

    

    <hr>



      <p ALIGN=center> &copy; 2016 -Mexicana de Lonas</p>





  

  

 <script src="{{asset('plugins/chosen/chosen.jquery.js')}}"></script>

 @yield('jschose')

  

  </body>

  

 



</html>