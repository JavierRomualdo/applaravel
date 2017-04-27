@extends('layouts.master')
@section('title', 'Usuario Eliminar')
@section('content')
  <ol class="breadcrumb">
    <li><a href="{{url('dashboards')}}">Escritorio</a></li>
    <li class="active"><a href="{{url('usuarios')}}">Usuarios</a></li>
    <li class="active">Eliminar Usuario</li>
  </ol>

  <div class="page-header">
    <h1>Usuario Eliminar</h1>
  </div>

  <div class="row">
    <div class="col-md-6">

       <div class="panel panel-default">
         <div class="panel-heading">
            Eliminar
          </div>
         <div class="panel-body">
           {!!Form::open(['route'=>['usuarios.update',$usuario->id],'method'=>'DELETE'])!!}
           <div class="form-group">
             <label for="exampleInputPassword1">¿DESEA ELIMINAR ESTE REGISTRO?</label>
           </div>
           <div class="form-group">
             {!!form::label('Usuario:')!!}
             {!!$usuario->nombre!!}
           </div>
           <div class="form-group">
             {!!form::label('Email:')!!}
             {!!$usuario->email!!}
           </div>
           <div class="form-group">
             {!!form::label('Password:')!!}
             {!!$usuario->password!!}
           </div>
           {!!form::submit('Grabar',['name'=>'grabar','id'=>'grabar','content'=>'<span>Grabar</span>','class'=>'btn
             btn-warning btn-sm m-t-10'])!!}
             <a href="{{url('usuarios')}}" id="cancelar" name="cancelar" class="btn btn-info btn-sm m-t-10">Cancelar</a>
             {!!Form::close()!!}
         </div>
       </div>
    </div>
  </div>
@endsection
