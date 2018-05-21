<?php

namespace Workflow\Http\Controllers;

use Illuminate\Http\Request;
use Workflow\Proceso_titulacion;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home', ['procesos' => Proceso_titulacion::all()]);
    }
}
