@extends('layouts.master')
@section('title', 'Eliminar Servicio')
@section('content')
  <ol class="breadcrumb">
    <li><a href="{{url('dashboards')}}">Escritorio</a></li>
    <li class="active"><a href="{{url('servicios')}}">Servicios</a></li>
    <li class="active">Eliminar Producto</li>
  </ol>

  <div class="page-header">
    <h1>Producto Eliminar</h1>
  </div>

  <div class="row">
    <div class="col-md-6">

       <div class="panel panel-default">
         <div class="panel-heading">
            Eliminar
          </div>
         <div class="panel-body">
           {!!Form::open(['route'=>['servicios.update',$servicio->id],'method'=>'DELETE'])!!}
           <div class="form-group">
             <label for="exampleInputPassword1">¿DESEA ELIMINAR ESTE REGISTRO?</label>
           </div>
           <div class="form-group">
             {!!form::label('Servicio:')!!}
             {!!$servicio->nombre!!}
           </div>
           <div class="form-group">
             {!!form::label('Descricion:')!!}
             {!!$servicio->descripcion!!}
           </div>
           {!!form::submit('Grabar',['name'=>'grabar','id'=>'grabar','content'=>'<span>Grabar</span>','class'=>'btn
             btn-warning btn-sm m-t-10'])!!}
             <a href="{{url('servicios')}}" id="cancelar" name="cancelar" class="btn btn-info btn-sm m-t-10">Cancelar</a>
             {!!Form::close()!!}
         </div>
       </div>
    </div>
  </div>
@endsection
