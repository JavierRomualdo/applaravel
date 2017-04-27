@extends('layouts.master')
@section('title', 'Venta Eliminar')
@section('content')
  <ol class="breadcrumb">
    <li><a href="{{url('dashboards')}}">Escritorio</a></li>
    <li class="active"><a href="{{url('ventas')}}">Ventas</a></li>
    <li class="active">Eliminar Venta</li>
  </ol>

  <div class="page-header">
    <h1>Venta Eliminar</h1>
  </div>

  <div class="row">
    <div class="col-md-6">

       <div class="panel panel-default">
         <div class="panel-heading">
            Eliminar
          </div>
         <div class="panel-body">
           <div class="panel-body">
             {!!Form::open(['route'=>['ventas.update',$venta->id],'method'=>'DELETE'])!!}
             <div class="form-group">
               <label for="exampleInputPassword1">¿DESEA ELIMINAR ESTE REGISTRO?</label>
             </div>
             <div class="form-group">
               {!!form::label('Cliente:')!!}
               {!!$cliente->nombres!!}
             </div>
             <div class="form-group">
               {!!form::label('Propiedad:')!!}
               {!!$propiedad->direccion!!}
             </div>
             <div class="form-group">
               {!!form::label('Fecha de Venta:')!!}
               {!!$venta->fechaVenta!!}
             </div>
             <div class="form-group">
               {!!form::label('Valoracion:')!!}
               {!!$venta->valoracion!!}
             </div>
             <div class="form-group">
               {!!form::label('Tipo Pago:')!!}
               {!!$venta->tipoPago!!}
             </div>
             {!!form::submit('Grabar',['name'=>'grabar','id'=>'grabar','content'=>'<span>Grabar</span>','class'=>'btn
               btn-warning btn-sm m-t-10'])!!}
               <a href="url('ventas')" id="cancelar" name="cancelar" class="btn btn-info btn-sm m-t-10">Cancelar</a>
               {!!Form::close()!!}
           </div>
         </div>
       </div>
    </div>
  </div>
@endsection
