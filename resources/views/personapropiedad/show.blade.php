@extends('layouts.master')
@section('title', 'Cliente Propiedad Eliminar')
@section('content')
  <ol class="breadcrumb">
    <li><a href="{{url('dashboards')}}">Escritorio</a></li>
    <li class="active"><a href="{{url('personapropiedad')}}">Cliente Propiedad</a></li>
    <li class="active">Eliminar Cliente\Propiedad</li>
  </ol>

  <div class="page-header">
    <h1>Cliente\Propiedad Eliminar</h1>
  </div>

  <div class="row">
    <div class="col-md-6">

       <div class="panel panel-default">
         <div class="panel-heading">
            Eliminar Cliente/Propiedad
          </div>
         <div class="panel-body">
           {!!Form::open(['route'=>['personapropiedad.update',$personapropiedad->id],'method'=>'DELETE'])!!}
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
           {!!form::submit('Grabar',['name'=>'grabar','id'=>'grabar','content'=>'<span>Grabar</span>','class'=>'btn
             btn-warning btn-sm m-t-10'])!!}
             <a href="{{url('personapropiedad')}}" id="cancelar" name="cancelar" class="btn btn-info btn-sm m-t-10">Cancelar</a>
             {!!Form::close()!!}
         </div>
       </div>
    </div>
  </div>
@endsection
