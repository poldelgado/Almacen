<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>@yield('title', 'TUC-TECNO')|Panel de Administracion</title> <!--Paso el titulo de la pagina por parametros a traves de los yield , default es un valor del titulo que se muestra por defecto cuando no se pasa un valor concreto-->
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/chosen/chosen.css')}}">
    
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">   
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  </head>
  <body>
      @include('admin.template.partials.nav')
    <section>
        <div class="container-fluid">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <strong>@yield('title', 'Tuc-tecno')</strong>
                </div>
                  <div class="panel-body">
                        @include('flash::message')<!--para que se muestren los mensajes con el paquete flash -->
                        @include('admin.template.partials.errors')
                  @yield('content')
                  </div>
            </div>        
                   <div class="panel-footer text-center"><a href="{{asset('/')}}"><img src="{{asset('images/marca_tucuman.png')}}" srcset="{{asset('images/marca_tucuman.png')}} 2x" width="60"></a> Tucuman Tecnologias © {{date("Y")}} | Todos los derechos reservados </div>
        </div>
    </section>


    <script src="{{ asset('plugins/chosen/chosen.jquery.js')}}"></script>
    {!! Html::script('js/dropdown.js')!!}
     @yield('js')
    </body>
</html>