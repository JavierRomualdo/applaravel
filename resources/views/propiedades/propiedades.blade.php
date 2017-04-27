@extends('layouts.master')
@section('title', 'Lista de Propiedades')
@section('content')
   <ol class="breadcrumb">
     <li><a href="{{url('dashboards')}}">Escritorio</a></li>
     <li class="active">Propiedades</li>
   </ol>
   <div class="page-header">
     <h1>Propiedades <small>[Actualizados hasta hoy]</small></h1>
   </div>

   <div class="row">
     <div class="col-md-12">
       @include('partials.messages')
        <div class="panel panel-default">
          <div class="panel-heading">
             Lista
             <p class="navbar-text navbar-right" style=" margin-top: 1px;">
                <!--<button type="button" id="nuevo" name='nuevo' class="btn btn-warning navbar-btn" style="margin-bottom: 1px; margin-top: -5px;margin-right: 8px;padding: 3px 20px;">Nuevo</button>
                -->
                <a href="{{route('propiedades.create')}}" class="btn btn-warning navbar-btn" style="margin-bottom: 1px; margin-top: -5px;margin-right: 8px;padding: 3px 20px;">Nuevo</a>
             </p>
           </div>
          <div class="panel-body">

             <table class="table table-bordered">
               <thead>
                  <th>N°</th>
                  <th>Tipo Propiedad</th>
                  <th>Servicio</th>
                  <th>Dirección</th>
                  <th>Descripción</th>
                  <th>Imagen</th>
                  <th>Acción</th>
               </thead>
               <tbody>
                 @foreach ($propiedades as $propiedad)
                   <tr>
                     <td>{{$propiedad->id}}</td>
                     <td>{{$propiedad->tipopropiedad}}</td>
                     <td>{{$propiedad->servicio}}</td>
                     <td>{{$propiedad->direccion}}</td>
                     <td>{{$propiedad->descripcion}}</td>
                     <td>
                       <a href="{{url('photo', $propiedad->id)}}">
                         <img src="img/propiedades/{{$propiedad->image}}" alt="" style="width: 30px; height: 44px;">
                         [Editar]
                       </a>
                     </td>
                     <td>
                       <a href="{{route('propiedades.edit',$propiedad->id)}}">[Editar]</a>
                       <a href="{{route('propiedades.show',$propiedad->id)}}">[Eliminar]</a>
                     </td>
                   </tr>
                 @endforeach
               </tbody>
             </table>
             <div class="text-center">
               {!!$propiedades->links()!!}
             </div>
          </div>
        </div>
     </div>
   </div>
@endsection
