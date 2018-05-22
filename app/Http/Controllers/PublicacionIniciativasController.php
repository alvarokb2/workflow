<?php

namespace Workflow\Http\Controllers;

use Illuminate\Http\Request;
use Iniciativa;

class PublicacionIniciativasController extends Controller
{
    //
    public function __construct()
    {

    }

    private static $tabla_estados = [
        ['validar_in' => '/^$/', 'validar_out' => '/^$/',
            'value' => 'Iniciativa creada con exito'],
        
        ['validar_in' => '/^$|[ce]$/', 'validar_out' => '/a$/',
            'value' => 'La iniciativa ha sido actualizada'],

        ['validar_in' => '/a$/', 'validar_out' => '/b$/',
            'value' => 'La iniciativa ha sido aprobada (DIC)'],

        ['validar_in' => '/a$/', 'validar_out' => '/c$/',
            'value' => 'La iniciativa presenta observaciones (DIC)'],

        ['validar_in' => '/b$/', 'validar_out' => '/d$/',
            'value' => 'La iniciativa ha sido aprobada (EI)'],

        ['validar_in' => '/b$/', 'validar_out' => '/e$/',
            'value' => 'La iniciativa presenta observaciones (EI)'],

        ['validar_in' => '/d$/', 'validar_out' => '/f$/',
            'value' => 'Iniciativa Publicada']

        ['validar_in' => '/^$|[ce]$/', 'validar_out' => '/g$/',
            'value' => 'Iniciativa eliminada con exito'],
        
    ];

    public function get_estado($estado)
    {
        foreach (PublicacionIniciativasController::$tabla_estados as $e) {
            if (preg_match($e['validar_out'], $estado)) {
                return $e['value'];
            }
        }
    }

    public function set_estado($estado_actual, $nuevo_estado)
    {
        if (strlen($nuevo_estado) != 1) return false;
        foreach (PublicacionIniciativasController::$tabla_estados as $estado) {
            if (preg_match($estado['validar_out'], $nuevo_estado)) {
                if (preg_match($estado['validar_in'], $estado_actual)) {
                    $iniciativa->add_estado($nuevo_estado);
                    return true;
                }
            }
        }
        return false;
    }
}
