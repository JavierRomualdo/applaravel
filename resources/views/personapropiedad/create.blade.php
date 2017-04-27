@extends('layouts.master')
@section('title', 'Cliente/Propiedad Nuevo')
@section('content')
  <ol class="breadcrumb">
    <li><a href="{{url('dashboards')}}">Escritorio</a></li>
    <li class="active"><a href="{{url('personapropiedad')}}">Cliente/Propiedad</a></li>
    <li class="active">Nuevo Cliente\Propiedad</li>
  </ol>
  @include('partials.messages')
  <div class="page-header">
    <h1>Cliente\Propiedad Nuevo</h1>
  </div>

  <div class="row">
    <div class="col-md-6">

       <div class="panel panel-default">
         <div class="panel-heading">
            Nuevo Cliente/Propiedad
          </div>
         <div class="panel-body">
           {!!Form::open(['route'=>'personapropiedad.store','method'=>'POST'])!!}
           <div class="form-group">
             {!!form::label('Cliente')!!}
             {!!Form::select('idPersona',$cliente,null,['id'=>'Cliente','class'=>'form-control'])!!}
           </div>
           <div class="form-group">
             {!!form::label('Propiedad')!!}
             {!!Form::select('idPropiedad',$propiedad,null,['id'=>'Cliente','class'=>'form-control'])!!}
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
