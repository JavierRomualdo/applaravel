@extends('layouts.master')
@section('title', 'Tipo Propiedad Nuevo')
@section('content')
  <ol class="breadcrumb">
    <li><a href="{{url('dashboards')}}">Escritorio</a></li>
    <li class="active"><a href="{{url('tipopropiedad')}}">Tipo Propiedad</a></li>
    <li class="active">Nuevo Tipo Propiedad</li>
  </ol>
  @include('partials.messages')
  <div class="page-header">
    <h1>Tipo Propiedad Nuevo</h1>
  </div>

  <div class="row">
    <div class="col-md-6">

       <div class="panel panel-default">
         <div class="panel-heading">
            Tipo Propiedad
          </div>
         <div class="panel-body">
           {!!Form::open(['route'=>'tipopropiedad.store','method'=>'POST'])!!}

           <div class="form-group">
             {!!form::label('Nombre')!!}
             {!!form::text('nombre', null,['id'=>'nombre','class'=>'form-control','placeholder'=>'Digite Tipo de Propiedad'])!!}
           </div>
           <div class="form-group">
             {!!form::label('Descripcion')!!}
             {!!form::textarea('descripcion',null,['id'=>'descripcion','class'=>'form-control','placeholder'=>'Digite la Descripcion', 'rows'=>"8", 'cols'=>"80"])!!}
           </div>
           {!!form::submit('Grabar',['name'=>'grabar','id'=>'grabar','content'=>'<span>Grabar</span>','class'=>'btn
             btn-warning btn-sm m-t-10'])!!}
             <a href="{{url('tipopropiedad')}}" id="cancelar" name="cancelar" class="btn btn-info btn-sm m-t-10">Cancelar</a>
             {!!Form::close()!!}
         </div>
       </div>
    </div>
  </div>
@endsection
