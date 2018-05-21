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
        //}

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
        $iniciativa->nombre = $request->nombre;
        $iniciativa->descripcion = $request->descripcion;
        $iniciativa->producto_esperado = $request->producto_esperado;
        $iniciativa->save();

        $p = new PublicacionIniciativasController();
        $p->set_estado(Iniciativa::find($request->id), 'a');   
        return $p;
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
        $iniciativa->delete();
    }

    public function denegated()
    {
        echo "denegated\n";
        return redirect()->back();
    }

    public function validar_dic($request){
        if($request->value){
            $estado = 'b';}
        else{
            $estado = 'c';}
        $p = new PublicacionIniciativasController();
        $p->set_estado(Iniciativa::find($request->id), $estado);   
        return $p;
    }

    public function validar_ei($request){
    if($request->value){
            $estado = 'd';}
        else{
            $estado = 'e';}
        $p = new PublicacionIniciativasController();
        $p->set_estado(Iniciativa::find($request->id), $estado);   
        return $p;
    }

    public function publicar($resquest){
        $p = new PublicacionIniciativasController();
        $p->set_estado(Iniciativa::find($request->id), 'f');
        return $p;
    }
}
