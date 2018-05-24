<?php

namespace Workflow\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use Workflow\Http\Controllers\PublicacionIniciativasController;
use Workflow\Iniciativa;

class IniciativaController extends Controller
{

    public function __construct()
    {
        $this->middleware('verify.role');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $iniciativa = Iniciativa::find($id);
        $nuevo_estado = $iniciativa->estado . 'a';
        $p = new PublicacionIniciativasController();
        if ($p->check_final_status($iniciativa->estado, $nuevo_estado)) {
            $iniciativa->nombre = $request->nombre;
            $iniciativa->descripcion = $request->descripcion ?: '';
            $iniciativa->producto_esperado = $request->producto_esperado ?: '';
            $iniciativa->estado = $nuevo_estado;
            $iniciativa->save();
        }
        return redirect('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $iniciativa = Iniciativa::find($id);
        $nuevo_estado = $iniciativa->estado . 'g';
        $p = new PublicacionIniciativasController();
        if ($p->check_final_status($iniciativa->estado, $nuevo_estado)) {
            $iniciativa->delete();
        }
        return redirect('home');
    }

    public function denegated()
    {
        return response('acceso denefado.');
    }

    public function validar_dic(Request $request)
    {
        $iniciativa = Iniciativa::find($request->id);
        $nuevo_estado = $iniciativa->estado . ($request->value ? 'b' : 'c');
        $p = new PublicacionIniciativasController();
        if ($p->check_final_status($iniciativa->estado, $nuevo_estado)) {
            $iniciativa->estado = $nuevo_estado;
            $iniciativa->save();
        }
        return redirect('home');
    }

    public function validar_ei(Request $request)
    {
        $iniciativa = Iniciativa::find($request->id);
        $nuevo_estado = $iniciativa->estado . ($request->value ? 'd' : 'e');
        $p = new PublicacionIniciativasController();
        if ($p->check_final_status($iniciativa->estado, $nuevo_estado)) {
            $iniciativa->estado = $nuevo_estado;
            $iniciativa->save();
        }
        return redirect('home');
    }

    public function publicar(Request $request)
    {
        $iniciativa = Iniciativa::find($request->id);
        $nuevo_estado = $iniciativa->estado . 'f';
        $p = new PublicacionIniciativasController();
        if ($p->check_final_status($iniciativa->estado, $nuevo_estado)) {
            $iniciativa->estado = $nuevo_estado;
            $iniciativa->save();
        }
        return redirect('home');
    }
}
