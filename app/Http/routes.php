<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
    //return view('dashboard');
});

Route::group(['middlewareGroup'=>['web']], function(){//middleware
  Route::auth();
  Route::get('/home', 'HomeController@index');

  Route::get('dashboard', 'dashboardController@index');//->middleware('auth')
  //Rutas Sistema Inmobiliaria
  Route::resource('servicios','Inmobiliaria\ServiciosController');
  Route::resource('persona', 'Inmobiliaria\personaController');
  Route::resource('personapropiedad', 'Inmobiliaria\personapropiedadController');
  Route::resource('propiedades', 'Inmobiliaria\propiedadesController');
  Route::resource('tipopropiedad', 'Inmobiliaria\tipopropiedadController');
  Route::resource('ventas', 'Inmobiliaria\ventasController');
  Route::resource('usuarios', 'Inmobiliaria\UsuariosController');

  //Desktop
  Route::get('inicio','Desktop\DesktopController@inicio');
  Route::get('propiedad','Desktop\DesktopController@propiedades');
  Route::get('servicio','Desktop\DesktopController@servicios');
  Route::get('contactanos','Desktop\DesktopController@contactanos');

  //Para el middleware
  Route::group(['prefix'=>'admin','middleware'=>['auth','admin']], function(){
    route::get('demo',['as'=>'demo','uses'=>'DemoController@index']);
  });

  /* -------------- upload image -------------*/
  route::get('photo/{page?}', 'Inmobiliaria\propiedadesController@photo');
  route::post('photopropiedad', 'Inmobiliaria\propiedadesController@update_photo');
  /*--------------- upload image -------------*/
});
