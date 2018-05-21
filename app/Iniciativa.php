<?php

namespace Workflow;

use Illuminate\Database\Eloquent\Model;

class Iniciativa extends Model
{
    protected $fillable = [
        'nombre', 'descripcion', 'producto_esperado', 'estado', 'user_id',
    ];

    //
    public function proceso_titulacion()
    {
        return $this->belongsTo('Workflow\Proceso_titulacion');
    }

    public static function crear($user_id, $nombre, $descripcion = '', $producto_esperado = '')
    {
        $iniciativa = Iniciativa::create([
            'nombre' => $nombre,
            'descripcion' => $descripcion,
            'producto_esperado' => $producto_esperado,
            'estado' => '',
            'user_id' => $user_id
        ]);
        $iniciativa->save();
        return $iniciativa;
    }

    public function add_estado($nuevo_estado){
        $this->estado = $this->estado . $nuevo_estado;
        $this->save();
        return $this->estado;
    }

    public function get_estado(){
        return $this->estado;
    }
}
