<?php

namespace JAT\Http\Controllers\Inmobiliaria;

use Illuminate\Http\Request;

use JAT\Http\Requests;
use JAT\Http\Controllers\Controller;
use JAT\Models\Inmobiliaria\ventas;
use JAT\Models\Inmobiliaria\persona;
use JAT\Models\Inmobiliaria\propiedades;

use JAT\Http\Requests\ventas\ventasCreateRequest;
use JAT\Http\Requests\ventas\ventasUpdateRequest;
use Session;
class ventasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
     {
       # code...
       $this->middleware('auth');
     }

    public function index()
    {
        //
        $ventas=ventas::select('ventas.id','persona.nombres as cliente','propiedades.direccion as propiedad',
                      'ventas.fechaVenta','ventas.valoracion','ventas.tipoPago')->join('persona','persona.id','=',
                      'ventas.idPersona')->join('propiedades','propiedades.id','=','ventas.idPropiedad')->get();
        return view('ventas\ventas')->with('ventas', $ventas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $clientes=persona::lists('nombres','id')->prepend('Seleccione Cliente');
        $propiedades=propiedades::lists('direccion','id')->prepend('Selecione Propiedad');
        return view('ventas.create', array('clientes'=>$clientes,'propiedades'=>$propiedades));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ventasCreateRequest $request)
    {
        //
        ventas::create($request->all());
        Session::flash('save','Se ha creado correctamente');
        return redirect()->route('ventas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $ventas=ventas::FindOrFail($id);
        $clientes=persona::FindOrFail($ventas->idPersona);
        $propiedades=propiedades::FindOrFail($ventas->idPropiedad);
        return view('ventas.show',array('cliente'=>$clientes,'propiedad'=>$propiedades,'venta'=>$ventas));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $clientes=persona::lists('nombres','id')->prepend('Seleccione Cliente');
        $propiedades=propiedades::lists('direccion','id')->prepend('Selecione Propiedad');
        $ventas=ventas::FindOrFail($id);
        return view('ventas.edit',array('clientes'=>$clientes,'propiedades'=>$propiedades,'venta'=>$ventas));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ventasUpdateRequest $request, $id)
    {
        //
        $ventas=ventas::FindOrFail($id);
        $input=$request->all();
        $ventas->fill($input)->save();
        Session::flash('update','Se ha actualizado correctamente');
        return redirect()->route('ventas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $ventas=ventas::FindOrFail($id);
        $ventas->delete();
        Session::flash('delete','Se ha eliminado correctamente');
        return redirect()->route('ventas.index');
    }
}
