@extends('layouts.master')
@section('title', 'Lista de Clientes')
@section('content')
   <ol class="breadcrumb">
     <li><a href="{{url('dashboards')}}">Escritorio</a></li>
     <li class="active">Clientes</li>
   </ol>
   <div class="page-header">
     <h1>Clientes <small>[Actualizados hasta hoy]</small></h1>
   </div>

   <div class="row">
     <div class="col-md-8">
       @include('partials.messages')
        <div class="panel panel-default">
          <div class="panel-heading">
             Lista
             <p class="navbar-text navbar-right" style=" margin-top: 1px;">
                <!--<button type="button" id="nuevo" name='nuevo' class="btn btn-warning navbar-btn" style="margin-bottom: 1px; margin-top: -5px;margin-right: 8px;padding: 3px 20px;">Nuevo</button>
                -->
                <a href="{{route('persona.create')}}" class="btn btn-warning navbar-btn" style="margin-bottom: 1px; margin-top: -5px;margin-right: 8px;padding: 3px 20px;">Nuevo</a>
             </p>
           </div>
          <div class="panel-body">

             <table class="table table-bordered">
               <thead>
                  <th>N°</th>
                  <th>Nombres</th>
                  <th>Apellidos</th>
                  <th>Email</th>
                  <th>Telefono</th>
                  <th>Clave</th>
                  <th>Acción</th>
               </thead>
               <tbody>
                 @foreach ($personas as $persona)
                   <tr>
                     <td>{{$persona->id}}</td>
                     <td>{{$persona->nombres}}</td>
                     <td>{{$persona->apellidos}}</td>
                     <td>{{$persona->email}}</td>
                     <td>{{$persona->telefono}}</td>
                     <td>{{$persona->clave}}</td>
                     <td>
                       <a href="{{route('persona.edit',$persona->id)}}">[Editar]</a>
                       <a href="{{route('persona.show',$persona->id)}}">[Eliminar]</a>
                     </td>
                   </tr>
                 @endforeach
               </tbody>
             </table>
          </div>
        </div>
     </div>
   </div>
@endsection
