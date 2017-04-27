@extends('layouts.master')
@section('title', 'Cliente Eliminar')
@section('content')
  <ol class="breadcrumb">
    <li><a href="{{url('dashboards')}}">Escritorio</a></li>
    <li class="active"><a href="{{url('persona')}}">Clientes</a></li>
    <li class="active">Eliminar Cliente</li>
  </ol>

  <div class="page-header">
    <h1>Cliente Eliminar</h1>
  </div>

  <div class="row">
    <div class="col-md-6">

       <div class="panel panel-default">
         <div class="panel-heading">
            Eliminar Cliente
          </div>
         <div class="panel-body">
           {!!Form::open(['route'=>['persona.update',$persona->id],'method'=>'DELETE'])!!}
           <div class="form-group">
             <label for="exampleInputPassword1">¿DESEA ELIMINAR ESTE REGISTRO?</label>
           </div>
           <div class="form-group">
             {!!form::label('Nombres:')!!}
             {!!$persona->nombres!!}
           </div>
           <div class="form-group">
             {!!form::label('Apellidos:')!!}
             {!!$persona->apellidos!!}
           </div>
           <div class="form-group">
             {!!form::label('Email:')!!}
             {!!$persona->email!!}
           </div>
           <div class="form-group">
             {!!form::label('Telefono:')!!}
             {!!$persona->telefono!!}
           </div>
           <div class="form-group">
             {!!form::label('Clave:')!!}
             {!!$persona->clave!!}
           </div>
           {!!form::submit('Grabar',['name'=>'grabar','id'=>'grabar','content'=>'<span>Grabar</span>','class'=>'btn
             btn-warning btn-sm m-t-10'])!!}
             <a href="{{url('persona')}}" id="cancelar" name="cancelar" class="btn btn-info btn-sm m-t-10">Cancelar</a>
             {!!Form::close()!!}
         </div>
       </div>
    </div>
  </div>
@endsection
