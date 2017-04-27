<?php

namespace JAT\Http\Controllers\Inmobiliaria;

use Illuminate\Http\Request;

use JAT\Http\Requests;
use JAT\Http\Controllers\Controller;
use JAT\Models\Inmobiliaria\propiedades;
use JAT\Models\Inmobiliaria\tipopropiedad;
use JAT\Models\Inmobiliaria\servicios;

use JAT\Http\Requests\propiedades\propiedadesCreateRequest;
use JAT\Http\Requests\propiedades\propiedadesUpdateRequest;
use Image;
use Session;
class propiedadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //"laracasts:flash":"~1.3"
        $propiedades=propiedades::select('propiedades.id','tipopropiedad.nombre as tipopropiedad',
                      'servicios.nombre as servicio','propiedades.direccion','propiedades.image',
                      'propiedades.descripcion')->join('tipopropiedad',
                      'tipopropiedad.id','=','propiedades.idTipoPropiedad')->join('servicios',
                      'servicios.id','=','propiedades.idServicio')->paginate(5);
        return view('propiedades\propiedades')->with('propiedades', $propiedades);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $tiposPropiedad=tipopropiedad::lists('nombre','id')->prepend('Seleccione Tipo Propiedad');
        $servicios=servicios::lists('nombre','id')->prepend('Selecione Servicio');
        return view('propiedades.create', array('tipospropiedad'=>$tiposPropiedad,'servicios'=>$servicios));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(propiedadesCreateRequest $request)
    {
        //
        propiedades::create($request->all());
        Session::flash('save','Se ha creado correctamente');
        return redirect()->route('propiedades.index');
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
        $propiedades=propiedades::FindOrFail($id);
        $tipospropiedad=tipopropiedad::FindOrFail($propiedades->idTipoPropiedad);
        $servicios=servicios::FindOrFail($propiedades->idServicio);
        return view('propiedades.show',array('propiedad'=>$propiedades,'tipopropiedad'=>$tipospropiedad,
                'servicio'=>$servicios));
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
        $tiposPropiedad=tipopropiedad::lists('nombre','id')->prepend('Seleccione Tipo Propiedad');
        $servicios=servicios::lists('nombre','id')->prepend('Seleccione Servicio');
        $propiedades=propiedades::FindOrFail($id);
        return view('propiedades.edit',array('tipospropiedad'=>$tiposPropiedad,
                      'servicios'=>$servicios,'propiedad'=>$propiedades));
    }

    public function photo($id)
    {
      # code...
      $propiedad = propiedades::find($id);
      return view('propiedades.photo')->with('propiedad', $propiedad);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(propiedadesUpdateRequest $request, $id)
    {
        //
        $propiedades=propiedades::FindOrFail($id);
        $input=$request->all();
        $propiedades->fill($input)->save();
        Session::flash('update','Se ha actualizado correctamente');
        return redirect()->route('propiedades.index');
    }

    public function update_photo(Request $request)
    {
      # code...
      $photo = $request->file('photo');
      $filename = time().'.'.$photo->getClientOriginalExtension();
      Image::make($photo)->resize(380,600)->save(public_path('img/propiedades/'.$filename));
      $propiedades=propiedades::find($request->get('id'));
      $propiedades->image=$filename;
      $propiedades->save();
      return view('propiedades.photo')->with('propiedad', $propiedades);
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
        $propiedades=propiedades::FindOrFail($id);
        $propiedades->delete();
        Session::flash('delete','Se ha eliminado correctamente');
        return redirect()->route('propiedades.index');
    }
}
