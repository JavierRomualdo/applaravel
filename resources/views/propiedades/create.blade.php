@extends('layouts.master')
@section('title', 'Propiedad Nueva')
@section('content')
  <ol class="breadcrumb">
    <li><a href="{{url('dashboards')}}">Escritorio</a></li>
    <li class="active"><a href="{{url('propiedades')}}">Propiedades</a></li>
    <li class="active">Nueva Propiedad</li>
  </ol>
  @include('partials.messages')
  <div class="page-header">
    <h1>Propiedad Nueva</h1>
  </div>

  <div class="row">
    <div class="col-md-6">

       <div class="panel panel-default">
         <div class="panel-heading">
            Nueva Propiedad
          </div>
         <div class="panel-body">
           {!!Form::open(['route'=>'propiedades.store','method'=>'POST'])!!}
           <div class="form-group">
             {!!form::label('TipoPropiedad')!!}
             {!!Form::select('idTipoPropiedad',$tipospropiedad,null,['id'=>'TipoPropiedad','class'=>'form-control'])!!}
           </div>
           <div class="form-group">
             {!!form::label('Servicio')!!}
             {!!Form::select('idServicio',$servicios,null,['id'=>'Servicio','class'=>'form-control'])!!}
           </div>
           <div class="form-group">
             {!!form::label('Direccion')!!}
             {!!form::text('direccion', null,['id'=>'Direccion','class'=>'form-control','placeholder'=>'Digite Direccion'])!!}
           </div>
           <div class="form-group">
             {!!form::label('Descripcion')!!}
             {!!form::textarea('descripcion',null,['id'=>'descripcion','class'=>'form-control','placeholder'=>'Digite la Descripcion', 'rows'=>"8", 'cols'=>"80"])!!}
           </div>
           {!!form::submit('Grabar',['name'=>'grabar','id'=>'grabar','content'=>'<span>Grabar</span>','class'=>'btn
             btn-warning btn-sm m-t-10'])!!}
             <!--<button type="button" id="cancelar" name="cancelar" class="btn
               btn-info btn-sm m-t-10">Cancelar</button>-->
               <a href="{{url('propiedades')}}" id="cancelar" name="cancelar" class="btn btn-info btn-sm m-t-10">Cancelar</a>
             {!!Form::close()!!}
         </div>
       </div>
    </div>
  </div>
@endsection
