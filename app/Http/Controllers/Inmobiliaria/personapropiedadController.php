<?php

namespace JAT\Http\Controllers\Inmobiliaria;

use Illuminate\Http\Request;

use JAT\Http\Requests;
use JAT\Http\Controllers\Controller;
use JAT\Models\Inmobiliaria\personapropiedad;
use JAT\Models\Inmobiliaria\persona;
use JAT\Models\Inmobiliaria\propiedades;

use JAT\Http\Requests\personapropiedad\personapropiedadCreateRequest;
use JAT\Http\Requests\personapropiedad\personapropiedadUpdateRequest;
use Session;

class personapropiedadController extends Controller
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
        $personaspropiedad=personapropiedad::select('personapropiedad.id','persona.nombres as cliente',
                  'propiedades.direccion as propiedad')->join('persona','persona.id','=','personapropiedad.idPersona')->join('propiedades',
                  'propiedades.id','=','personapropiedad.idPropiedad')->get();
        return view('personapropiedad\personapropiedad')->with('personaspropiedad', $personaspropiedad);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //$lugares=propiedades::select('propiedades.direccion', 'propiedades.id')->get();
        $clientes=persona::lists('nombres','id')->prepend('Seleccione Cliente');
        $propiedades=propiedades::lists('direccion','id')->prepend('Seleccione Propiedad');
        return view('personapropiedad.create',array('cliente'=>$clientes,'propiedad'=>$propiedades));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(personapropiedadCreateRequest $request)
    {
        //
        personapropiedad::create($request->all());
        Session::flash('save','Se ha creado correctamente');
        return redirect()->route('personapropiedad.index');
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
        $personaspropiedad=personapropiedad::FindOrFail($id);
        $clientes=persona::FindOrFail($personaspropiedad->idPersona);
        $propiedades=propiedades::FindOrFail($personaspropiedad->idPropiedad);
        return view('personapropiedad.show',array('cliente'=>$clientes,'propiedad'=>$propiedades,
                    'personapropiedad'=>$personaspropiedad));
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
        $propiedades=propiedades::lists('direccion','id')->prepend('Seleccione Propiedad');
        $personaspropiedad=personapropiedad::FindOrFail($id);
        return view('personapropiedad.edit',array('cliente'=>$clientes,'propiedad'=>$propiedades,
                    'personapropiedad'=>$personaspropiedad));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(personapropiedadUpdateRequest $request, $id)
    {
        //
        $personaspropiedad=personapropiedad::FindOrFail($id);
        $input=$request->all();
        $personaspropiedad->fill($input)->save();
        Session::flash('update','Se ha actualizado correctamente');
        return redirect()->route('personapropiedad.index');
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
        $personaspropiedad=personapropiedad::FindOrFail($id);
        $personaspropiedad->detele();
        Session::flash('delete','Se ha eliminado correctamente');
        return redirect()->route('personapropiedad.index');
    }
}
