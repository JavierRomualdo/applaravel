<?php

namespace JAT\Http\Controllers;

use Illuminate\Http\Request;

use JAT\Http\Requests;

class dashboardController extends Controller
{
    //
    public function __construct()
    {
      # code...
      $this->middleware('auth');
    }
    public function index()
    {
      # code...
      return view('dashboard');
    }
}
