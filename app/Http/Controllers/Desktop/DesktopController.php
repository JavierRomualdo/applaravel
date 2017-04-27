<?php

namespace JAT\Http\Controllers\Desktop;

use Illuminate\Http\Request;

use JAT\Http\Requests;
use JAT\Http\Controllers\Controller;

class DesktopController extends Controller
{
    //
    public function inicio()
    {
      # code...
      return view('desktop.inicio');
    }

    public function propiedades()
    {
      # code...
      return view('desktop.propiedades');
    }

    public function servicios()
    {
      # code...
      return view('desktop.servicios');
    }

    public function contactanos()
    {
      # code...
      return view('desktop.contactanos');
    }
}
