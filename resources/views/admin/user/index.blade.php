@extends('admin.template.main')
@section('title','Listado de  Empleados')
@section('content')
@section('usuario','active')
<h3><b>Modulo de Gestion de Empleado</b></h3>
<a href="{{ asset('admin/user/create')}}" class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
<div class="col-xs-12">
<div class="table-responsive">
  <table class="table table-bordered table-condensed table-striped table-responsive table-hover">
    <thead>
      <th>#</th>
      <th>NOMBRE</th>
      <th>APELLIDO</th>
      <th>DNI</th>
      <th>TURNO</th>
      <th>TELEFONO</th>
      <th>PAIS</th>
      <th>PROVINCIA</th>
      <th>LOCALIDAD</th>
      <th>BARRIO</th>
      <th>CALLE</th>
      <th>NUMERO</th>
      <th>ACCION</th>
    </thead>
    <tbody>
      @foreach ($users as $user)
         <tr>
           <td>{{$user->id}}</td>
           <td>{{$user->name}}</td>
           <td>{{$user->apellido}}</td>
           <td>{{$user->dni}}</td>
           <td>{{$user->turno}}</td>
           <td>{{$user->telefono}}</td>
           <td>{{$user->domicilio->location->province->state->name}}</td>
           <td>{{$user->domicilio->location->province->name}}</td>
           <td>{{$user->domicilio->location->name}}</td>
           <td>{{$user->domicilio->barrio}}</td>
           <td>{{$user->domicilio->calle}}</td>
           <td>{{$user->domicilio->numero}}</td>
           <td><a href="{{route('admin.user.destroy',$user->id)}}" onclick="return confirm('Desea eliminar a {{$user->name}}')" class="btn btn-danger" title="Eliminar"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
            <a href="{{route('user.edit',$user->id)}}" class="btn btn-warning" title="Editar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a></td>
         </tr>
      @endforeach

    </tbody>
  </table>
  </div>
  </div>
  <p></p>
{!! $users->render() !!}
@endsection