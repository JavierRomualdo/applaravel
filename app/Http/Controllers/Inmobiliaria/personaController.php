<?php

namespace JAT\Http\Controllers\Inmobiliaria;

use Illuminate\Http\Request;

use JAT\Http\Requests;
use JAT\Http\Controllers\Controller;
use JAT\Models\Inmobiliaria\persona;

use JAT\Http\Requests\persona\personaCreateRequest;
use JAT\Http\Requests\persona\personaUpdateRequest;
use Session;
class personaController extends Controller
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
        $personas=persona::all();
        return view('persona\persona')->with('personas', $personas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('persona.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(personaCreateRequest $request)
    {
        //
        persona::create($request->all());
        Session::flash('save','Se ha creado correctamente');
        return redirect()->route('persona.index');
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
        $personas=persona::FindOrFail($id);
        return view('persona.show')->with('persona', $personas);
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
        $personas=persona::FindOrFail($id);
        return view('persona.edit')->with('persona', $personas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(personaUpdateRequest $request, $id)
    {
        //
        $personas=persona::FindOrFail($id);
        $input=$request->all();
        $personas->fill($input)->save();
        Session::flash('update','Se ha actualizado correctamente');
        return redirect()->route('persona.index');
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
        $personas=persona::FindOrFail($id);
        $personas->delete();
        Session::flash('delete','Se ha eliminado correctamente');
        return redirect()->route('persona.index');
    }
}
