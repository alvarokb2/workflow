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
        '_' => ['validar_in' => '/^$/', 'validar_out' => '/^$/', 'value' => 'Iniciativa creada con exito'],
        'a' => ['validar_in' => '/^$|[ce]$/', 'validar_out' => '/a$/', 'value' => 'La iniciativa ha sido actualizada'],
        'b' => ['validar_in' => '/a$/', 'validar_out' => '/b$/', 'value' => 'La iniciativa ha sido aprobada (DIC)'],
        'c' => ['validar_in' => '/a$/', 'validar_out' => '/c$/', 'value' => 'La iniciativa presenta observaciones (DIC)'],
        'd' => ['validar_in' => '/b$/', 'validar_out' => '/d$/', 'value' => 'La iniciativa ha sido aprobada (EI)'],
        'e' => ['validar_in' => '/b$/', 'validar_out' => '/e$/', 'value' => 'La iniciativa presenta observaciones (EI)'],
        'f' => ['validar_in' => '/d$/', 'validar_out' => '/f$/', 'value' => 'Iniciativa Publicada'],
        'g' => ['validar_in' => '/^$|[ce]$/', 'validar_out' => '/g$/', 'value' => 'Iniciativa eliminada con exito'],
    ];

    public function get_status($estado)
    {
        foreach (PublicacionIniciativasController::$tabla_estados as $e) {
            if (preg_match($e['validar_out'], $estado)) {
                return $e;
            }
        }
        return null;
    }

    public function get_status_value($estado)
    {
        foreach (PublicacionIniciativasController::$tabla_estados as $e) {
            if (preg_match($e['validar_out'], $estado)) {
                return $e['value'];
            }
        }
        return '';
    }

    public function check_final_status($estado_inicial, $estado_final)
    {
        foreach (PublicacionIniciativasController::$tabla_estados as $e) {
            if (preg_match($e['validar_out'], $estado_final)) {
                if (preg_match($e['validar_in'], $estado_inicial)) {
                    return true;
                }
            }
        }
        return false;
    }
}
