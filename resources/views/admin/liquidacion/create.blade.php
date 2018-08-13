@extends('admin.template.main')
@section('title','Creando Liquidacion')
@section('content')
@section('usuario','active')
{!! Form::open(['route' => 'liquidacion.store','method'=>'POST']) !!}
<div class="form-group">
    <div class="row">
        <div class="col-lg-2">
            {!! Form::label('user','Empleado',['class'=>'col-lg-1 control-label']) !!} 
        </div>
        <div class="col-lg-2">
           {!! Form::select('user',$users,null,['class' => 'form-control select-user','multiple','required']) !!}
        </div>
        <div class="col-lg-2">
                {!! Form::label('periodo','Periodo',['class'=>'control-label']) !!}
              </div>
                <div class="col-lg-2">
                {!! Form::select('periodo',['' => 'Seleccione un Periodo', 'Enero'=>'Enero','Febrero'=>'Febrero','Marzo'=>'Marzo','Abril'=>'Abril',
                    'Mayo'=>'Mayo','Junio'=>'Junio','Julio'=>'Julio','Agosto'=>'Agosto','Septiembre'=>'Septiembre','Octubre'=>'Octubre',
                    'Noviembre'=>'Noviembre','Diciembre'=>'Diciembre'],null,['class'=>'form-control select-periodo']) !!}
                </div>
                <div class="col-lg-2">
                        {!! Form::label('estado','Estado',['class'=>'control-label']) !!}
                      </div>
                        <div class="col-lg-2">
                        {!! Form::select('estado',['' => 'Seleccione un Estado', 'liquidado'=>'liquidado','pendiente'=>'pendiente'],null,['class'=>'form-control select-estado']) !!}
                        </div>
    </div>
    <div class="row">
            <div class="col-lg-2">
                    {!! Form::submit('Registrar',['class'=>'btn btn-primary']) !!}
            </div>
        </div>
</div>
{!! Form::close() !!}
@endsection
@section('js')
<script>
  $('.select-user').chosen({
no_results_text: "No se encontro ninguna coincidencia con:",
max_selected_options: 1,
placeholder_text_multiple: "SELECCIONE UN EMPLEADO"
  });
</script>
<script>
  $('.select-periodo').chosen({
no_results_text: "No se encontro ninguna coincidencia con:",
max_selected_options: 1,
placeholder_text_multiple: "SELECCIONE UN PERIODO"
   });
</script>
<script>
  $('.select-estado').chosen({
no_results_text: "No se encontro ninguna coincidencia con:",
max_selected_options: 1,
placeholder_text_multiple: "SELECCIONE UN ESTADO"
    });
</script>
@endsection
