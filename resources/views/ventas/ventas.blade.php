@extends('layouts.master')
@section('title', 'Lista de Ventas')
@section('content')
  
   <ol class="breadcrumb">
     <li><a href="{{url('dashboards')}}">Escritorio</a></li>
     <li class="active">Ventas</li>
   </ol>
   <div class="page-header">
     <h1>Ventas <small>[Actualizados hasta hoy]</small></h1>
   </div>

   <div class="row">
     <div class="col-md-10">
       @include('partials.messages')
        <div class="panel panel-default">
          <div class="panel-heading">
             Lista
             <p class="navbar-text navbar-right" style=" margin-top: 1px;">
                <!--<button type="button" id="nuevo" name='nuevo' class="btn btn-warning navbar-btn" style="margin-bottom: 1px; margin-top: -5px;margin-right: 8px;padding: 3px 20px;">Nuevo</button>
                -->
                <a href="{{route('ventas.create')}}" class="btn btn-warning navbar-btn" style="margin-bottom: 1px; margin-top: -5px;margin-right: 8px;padding: 3px 20px;">Nuevo</a>
             </p>
           </div>
          <div class="panel-body">

             <table class="table table-bordered">
               <thead>
                  <th>N°</th>
                  <th>Cliente</th>
                  <th>Propiedad</th>
                  <th>Fecha de Venta</th>
                  <th>Valoración</th>
                  <th>Tipo de Pago</th>
                  <th>Acción</th>
               </thead>
               <tbody>
                 @foreach ($ventas as $venta)
                   <tr>
                     <td>{{$venta->id}}</td>
                     <td>{{$venta->cliente}}</td>
                     <td>{{$venta->propiedad}}</td>
                     <td>{{$venta->fechaVenta}}</td>
                     <td>{{$venta->valoracion}}</td>
                     <td>{{$venta->tipoPago}}</td>
                     <td>
                       <a href="{{route('ventas.edit',$venta->id)}}">[Editar]</a>
                       <a href="{{route('ventas.show',$venta->id)}}">[Eliminar]</a>
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
