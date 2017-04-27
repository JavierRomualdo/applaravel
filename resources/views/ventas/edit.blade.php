@extends('layouts.master')
@section('title', 'Venta Editar')
@section('content')
  <ol class="breadcrumb">
    <li><a href="{{url('dashboards')}}">Escritorio</a></li>
    <li class="active"><a href="{{url('ventas')}}">Ventas</a></li>
    <li class="active">Editar Venta</li>
  </ol>
  @include('partials.messages')
  <div class="page-header">
    <h1>Venta Editar</h1>
  </div>

  <div class="row">
    <div class="col-md-6">

       <div class="panel panel-default">
         <div class="panel-heading">
            Editar Venta
          </div>
         <div class="panel-body">
           {!!Form::model($venta,['route'=>['ventas.update',$venta->id],'method'=>'PUT'])!!}
           <div class="form-group">
             {!!form::label('Cliente')!!}
             {!!Form::select('idPersona',$clientes,null,['id'=>'Cliente','class'=>'form-control'])!!}
           </div>
           <div class="form-group">
             {!!form::label('Propiedades')!!}
             {!!Form::select('idPropiedad',$propiedades,null,['id'=>'Propiedades','class'=>'form-control'])!!}
           </div>
           <div class="form-group">
             {!!form::label('FechaVenta')!!}
             {!!form::text('fechaVenta', null,['id'=>'Fecha Venta','class'=>'form-control','placeholder'=>'Digite Fecha'])!!}
           </div>
           <div class="form-group">
             {!!form::label('Valoracion')!!}
             {!!form::text('valoracion', null,['id'=>'Valoracion','class'=>'form-control','placeholder'=>'Digite Valoracion'])!!}
           </div>
           <div class="form-group">
             {!!form::label('TipoPago')!!}
             {!!form::text('tipoPago', null,['id'=>'TipoPago','class'=>'form-control','placeholder'=>'Digite Tipo de Pago'])!!}
           </div>
           {!!form::submit('Grabar',['name'=>'grabar','id'=>'grabar','content'=>'<span>Grabar</span>','class'=>'btn
             btn-warning btn-sm m-t-10'])!!}
             <a href="{{url('ventas')}}" id="cancelar" name="cancelar" class="btn btn-info btn-sm m-t-10">Cancelar</a>
             {!!Form::close()!!}
         </div>
       </div>
    </div>
  </div>
@endsection
