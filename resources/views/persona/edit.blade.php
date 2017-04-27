@extends('layouts.master')
@section('title', 'Cliente Editar')
@section('content')
  <ol class="breadcrumb">
    <li><a href="{{url('dashboards')}}">Escritorio</a></li>
    <li class="active"><a href="{{url('persona')}}">Clientes</a></li>
    <li class="active">Editar Cliente</li>
  </ol>
  @include('partials.messages')
  <div class="page-header">
    <h1>Cliente Editar</h1>
  </div>

  <div class="row">
    <div class="col-md-6">

       <div class="panel panel-default">
         <div class="panel-heading">
            Editar Cliente
          </div>
         <div class="panel-body">
           {!!Form::model($persona,['route'=>['persona.update',$persona->id],'method'=>'PUT'])!!}

           <div class="form-group">
             {!!form::label('Nombres')!!}
             {!!form::text('nombres', null,['id'=>'Nombres','class'=>'form-control','placeholder'=>'Digite Nombres'])!!}
           </div>
           <div class="form-group">
             {!!form::label('Apellidos')!!}
             {!!form::text('apellidos', null,['id'=>'Apellidos','class'=>'form-control','placeholder'=>'Digite Apellidos'])!!}
           </div>
           <div class="form-group">
             {!!form::label('Email')!!}
             {!!form::text('email', null,['id'=>'Email','class'=>'form-control','placeholder'=>'Digite Email'])!!}
           </div>
           <div class="form-group">
             {!!form::label('Clave')!!}
             {!!form::text('clave', null,['id'=>'Clave','class'=>'form-control','placeholder'=>'Digite Clave'])!!}
           </div>
           <div class="form-group">
             {!!form::label('Telefono')!!}
             {!!form::text('telefono', null,['id'=>'Telefono','class'=>'form-control','placeholder'=>'Digite Telefono'])!!}
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
