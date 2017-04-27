@extends('layouts.master')
@section('title', 'Editar Producto')
@section('content')
  <ol class="breadcrumb">
    <li><a href="{{url('dashboards')}}">Escritorio</a></li>
    <li class="active"><a href="{{url('servicios')}}">Servicios</a></li>
    <li class="active">Editar Producto</li>
  </ol>
  @include('partials.messages')
  <div class="page-header">
    <h1>Editar Producto</h1>
  </div>

  <div class="row">
    <div class="col-md-6">

       <div class="panel panel-default">
         <div class="panel-heading">
            Editar Producto
          </div>
         <div class="panel-body">
           {!!Form::model($servicios,['route'=>['servicios.update',$servicios->id],'method'=>'PUT'])!!}

           <div class="form-group">
             {!!form::label('Nombre')!!}
             {!!form::text('nombre', null,['id'=>'nombre','class'=>'form-control','placeholder'=>'Digite Servicio'])!!}
           </div>
           <div class="form-group">
             <label for="exampleInputPassword1">Precio</label>
             {!!form::label('Descripcion')!!}
             {!!form::textarea('descripcion',null,['id'=>'descripcion','class'=>'form-control','placeholder'=>'Digite la Descripcion', 'rows'=>"8", 'cols'=>"80"])!!}
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
