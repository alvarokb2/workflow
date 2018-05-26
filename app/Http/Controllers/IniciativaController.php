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
        if ($p->check_final_status($iniciativa->estado, $nuevo_estado, $estado)) {
            $iniciativa->nombre = $request->nombre;
            $iniciativa->descripcion = $request->descripcion ?: '';
            $iniciativa->producto_esperado = $request->producto_esperado ?: '';
            $iniciativa->estado = $nuevo_estado;
            $iniciativa->save();
            session(['msg' => [
                'class' => 'success',
                'value' => $estado['s_msg']
            ]]);
            return redirect('home');
        }
        return $this->denegated($request, $p->get_status('a'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //
        $iniciativa = Iniciativa::find($id);
        $nuevo_estado = $iniciativa->estado . 'g';
        $p = new PublicacionIniciativasController();
        if ($p->check_final_status($iniciativa->estado, $nuevo_estado, $estado)) {
            $iniciativa->delete();
            session(['msg' => [
                'class' => 'success',
                'value' => $estado['s_msg']
            ]]);
            return redirect('home');
        }
        return $this->denegated($request, $p->get_status('g'));
    }

    public function validar_dic(Request $request)
    {
        $iniciativa = Iniciativa::find($request->id);
        $nuevo_estado = $iniciativa->estado . ($request->value ? 'b' : 'c');
        $p = new PublicacionIniciativasController();
        if ($p->check_final_status($iniciativa->estado, $nuevo_estado, $estado)) {
            $iniciativa->estado = $nuevo_estado;
            $iniciativa->save();
            session(['msg' => [
                'class' => 'success',
                'value' => $estado['s_msg']
            ]]);
            return redirect('home');
        }
        return $this->denegated($request, $p->get_status($request->value ? 'b' : 'c'));
    }

    public function validar_ei(Request $request)
    {
        $iniciativa = Iniciativa::find($request->id);
        $nuevo_estado = $iniciativa->estado . ($request->value ? 'd' : 'e');
        $p = new PublicacionIniciativasController();
        if ($p->check_final_status($iniciativa->estado, $nuevo_estado, $estado)) {
            $iniciativa->estado = $nuevo_estado;
            $iniciativa->save();
            session(['msg' => [
                'class' => 'success',
                'value' => $estado['s_msg']
            ]]);
            return redirect('home');
        }
        return $this->denegated($request, $p->get_status($request->value ? 'd' : 'e'));
    }

    public function publicar(Request $request)
    {
        $iniciativa = Iniciativa::find($request->id);
        $nuevo_estado = $iniciativa->estado . 'f';
        $p = new PublicacionIniciativasController();
        if ($p->check_final_status($iniciativa->estado, $nuevo_estado, $estado)) {
            $iniciativa->estado = $nuevo_estado;
            $iniciativa->save();
            session(['msg' => [
                'class' => 'success',
                'value' => $estado['s_msg']
            ]]);
            return redirect('home');
        }
        return $this->denegated($request, $p->find_status('f'));
    }

    public function denegated($request, $tag)
    {
        if (is_null($tag)) {
            session(['msg' => [
                'class' => 'danger',
                'value' => 'denegated access:<br>' . $request->route()->getActionName() . '<br>'
            ]]);
        } else {
            session(['msg' => [
                'class' => 'danger',
                'value' => 'failed to update status machine: ' . $tag['f_msg']
            ]]);
        }
        return redirect('home');
    }
}
