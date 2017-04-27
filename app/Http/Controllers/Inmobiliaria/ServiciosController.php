<?php

namespace JAT\Http\Controllers\Inmobiliaria;

use Illuminate\Http\Request;

use JAT\Http\Requests;
use JAT\Http\Controllers\Controller;

use JAT\Models\Inmobiliaria\servicios;
use JAT\Http\Requests\servicios\serviciosCreateRequest;
use JAT\Http\Requests\servicios\serviciosUpdateRequest;
use Session;
class ServiciosController extends Controller
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
        $servicios = servicios::all();
        return view('servicios\servicios')->with('servicios', $servicios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('servicios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(serviciosCreateRequest $request)
    {
        //
        servicios::create($request->all());
        Session::flash('save','Se ha creado correctamente');
        return redirect()->route('servicios.index');
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
        $servicios=servicios::FindOrFail($id);
        return view('servicios.show')->with('servicio', $servicios);
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
        $servicios = servicios::FindOrFail($id);
        return view('servicios.edit')->with('servicios', $servicios);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(serviciosUpdateRequest $request, $id)
    {
        //
        $servicios=servicios::FindOrFail($id);
        $input=$request->all();
        $servicios->fill($input)->save();
        Session::flash('update','Se ha actualizado correctamente');
        return redirect()->route('servicios.index');
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
        $servicios=servicios::FindOrFail($id);
        $servicios->delete();
        Session::flash('delete','Se ha eliminado correctamente');
        return redirect()->route('servicios.index');
    }
}
