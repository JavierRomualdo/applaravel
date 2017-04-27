@extends('layouts.master')
@section('title', 'Lista de Servicios')
@section('content')
   <ol class="breadcrumb">
     <li><a href="{{url('dashboards')}}">Escritorio</a></li>
     <li class="active">Servicios</li>
   </ol>
   <div class="page-header">
     <h1>Servicios <small>[Actualizados hasta hoy]</small></h1>
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
                <a href="{{route('servicios.create')}}" class="btn btn-warning navbar-btn" style="margin-bottom: 1px; margin-top: -5px;margin-right: 8px;padding: 3px 20px;">Nuevo</a>
             </p>
           </div>
          <div class="panel-body">

             <table class="table table-bordered">
               <thead>
                 <th>N°</th>
                 <th>Nombre</th>
                 <th>Descripción</th>
                 <th>Acción</th>
               </thead>
               <tbody>
                 @foreach ($servicios as $servicio)
                   <tr>
                     <td>{{$servicio->id}}</td>
                     <td>{{$servicio->nombre}}</td>
                     <td>{{$servicio->descripcion}}</td>
                     <td>
                       <a href="{{route('servicios.edit', $servicio->id)}}">[Editar]</a>
                       <a href="{{route('servicios.show', $servicio->id)}}">[Eliminar]</a>
                     </td>
                   </tr>
                 @endforeach
               </tbody>
             </table>
          </div>
        </div>
     </div>
   </div>
   </script>
@endsection
