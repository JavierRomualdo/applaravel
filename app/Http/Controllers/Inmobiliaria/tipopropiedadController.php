<?php

namespace JAT\Http\Controllers\Inmobiliaria;

use Illuminate\Http\Request;

use JAT\Http\Requests;
use JAT\Http\Controllers\Controller;

use JAT\Models\Inmobiliaria\tipopropiedad;
use JAT\Http\Requests\tipopropiedad\tipopropiedadCreateRequest;
use JAT\Http\Requests\tipopropiedad\tipopropiedadUpdateRequest;
use Session;
class tipopropiedadController extends Controller
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
        $tipospropiedad = tipopropiedad::all();
        return view('tipopropiedad\tipopropiedad')->with('tipospropiedad', $tipospropiedad);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('tipopropiedad.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(tipopropiedadCreateRequest $request)
    {
        //
        tipopropiedad::create($request->all());
        Session::flash('save','Se ha creado correctamente');
        return redirect()->route('tipopropiedad.index');
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
        $tipospropiedad=tipopropiedad::FindOrFail($id);
        return view('tipopropiedad.show')->with('tipopropiedad', $tipospropiedad);
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
        $tipospropiedad=tipopropiedad::FindOrFail($id);
        return view('tipopropiedad.edit')->with('tipopropiedad',$tipospropiedad);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(tipopropiedadUpdateRequest $request, $id)
    {
        //
        $tipospropiedad=tipopropiedad::FindOrFail($id);
        $input=$request->all();
        $tipospropiedad->fill($input)->save();
        Session::flash('update','Se ha actualizado correctamente');
        return redirect()->route('tipopropiedad.index');
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
        $tipospropiedad=tipopropiedad::FindOrFail($id);
        $tipospropiedad->delete();
        Session::flash('delete','Se ha eliminado correctamente');
        return redirect()->route('tipopropiedad.index');
    }
}
