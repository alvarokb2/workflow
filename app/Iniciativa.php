<?php

namespace Workflow;

use Illuminate\Database\Eloquent\Model;
use Workflow\Http\Controllers\PublicacionIniciativasController;

class Iniciativa extends Model
{
    protected $fillable = [
        'nombre', 'descripcion', 'producto_esperado', 'estado', 'user_id',
    ];

    //
    public function proceso_titulacion()
    {
        return $this->belongsToMany('Workflow\Proceso_titulacion');
    }

    public static function crear($proceso_titulacion_id, $user_id, $nombre, $descripcion = '', $producto_esperado = '')
    {
        $iniciativa = Iniciativa::create([
            'nombre' => $nombre,
            'descripcion' => $descripcion,
            'producto_esperado' => $producto_esperado,
            'estado' => '',
            'user_id' => $user_id
        ]);
        $iniciativa->save();
        Proceso_titulacion::find($proceso_titulacion_id)->iniciativas()->save($iniciativa);
        return $iniciativa;
    }

    public function add_estado($nuevo_estado){
        $this->estado = $this->estado . $nuevo_estado;
        $this->save();
        return $this->estado;
    }

    public function get_estado(){
        $r = new PublicacionIniciativasController();
        return $r->find_status($this->estado)['msg'];
    }
}
