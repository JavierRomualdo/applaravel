@extends('layouts.master')
@section('title', 'Usuario Nuevo')
@section('content')
  <ol class="breadcrumb">
    <li><a href="{{url('dashboards')}}">Escritorio</a></li>
    <li class="active"><a href="{{url('usuarios')}}">Usuarios</a></li>
    <li class="active">Editar Usuario</li>
  </ol>

  <div class="page-header">
    <h1>Usuario Editar</h1>
  </div>

  <div class="row">
    <div class="col-md-6">

       <div class="panel panel-default">
         <div class="panel-heading">
            Nuevo Usuario
          </div>
         <div class="panel-body">
           {!!Form::model($usuario, ['route'=>['usuarios.update',$usuario->id],'method'=>'PUT'])!!}

           <div class="form-group">
             {!!form::label('Nombre')!!}
             {!!form::text('nombre', null,['id'=>'Nombre','class'=>'form-control','placeholder'=>'Digite Usuario'])!!}
           </div>
           <div class="form-group">
             {!!form::label('Email')!!}
             {!!form::email('email', null,['id'=>'Email','class'=>'form-control','placeholder'=>'Digite Email'])!!}
           </div>
           <div class="form-group">
             {!!form::label('Password')!!}
             {!!form::password('password',['id'=>'Password', 'class'=>'form-control','placeholder'=>'Digite la Contraseña'])!!}
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
