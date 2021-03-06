<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>@yield('title', 'EDG')|Panel de Administración</title> <!--Paso el titulo de la pagina por parametros a traves de los yield , default es un valor del titulo que se muestra por defecto cuando no se pasa un valor concreto-->
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/chosen/chosen.css')}}">
    
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">   
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

  </head>
  <body>
      @include('admin.template.partials.nav')
    <section>
        <div class="container-fluid">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <strong>@yield('title', 'EDG')</strong>
                </div>
                  <div class="panel-body">
                        @include('flash::message')<!--para que se muestren los mensajes con el paquete flash -->
                        @include('admin.template.partials.errors')
                  @yield('content')
                  </div>
            </div>        
                   <div class="panel-footer text-center"> EDG Informática © {{date("Y")}} | Todos los derechos reservados </div>
        </div>
    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="{{ asset('plugins/chosen/chosen.jquery.js')}}"></script>
    {!! Html::script('js/dropdown.js')!!}
     @yield('js')
    </body>
</html>