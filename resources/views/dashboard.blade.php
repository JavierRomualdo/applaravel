@extends('layouts.master')
@section('title', 'Panel de Control')
@section('content')
  <!--<ol class="breadcrumb">
     <li>Panel de Control</li>
     <li class="active">Escritorio</li>
   </ol>-->

   <!-- Main component for a primary marketing message or call to action -->
   <br/>
   <div class="page-header text-center">
     <h1>Sistema Inmobiliaria <small>[J.A.T]</small></h1>
     <h3>[Administrador]</h3>
   </div>
   <br/>
   <div class="text-center">
     <img src="img/escudoJat.png" alt=""/>
     <h5>{{Date(\Carbon\Carbon::now())}}</h5>
   </div>
   <!--<div class="row">
     <div class="col-md-8">
          <img src="img/panelJant.png" alt=""/>
     </div>
   </div>-->
@endsection
