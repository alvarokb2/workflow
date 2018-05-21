<?php

namespace Workflow\Http\Controllers;

use Illuminate\Http\Request;
use Iniciativa;

class PublicacionIniciativasController extends Controller
{
    //
    public function __construct(){

    }

	private static $tabla_estados = [
		['validar_in' => '/^$/','validar_out' => '/^$/',
		 'value' => 'Iniciativa creada con exito'],
		
		['validar_in' => '/^$|[ce]$/','validar_out' => '/a$/',
		 'value' => 'La iniciativa ha sido actualizada'],
		
		['validar_in' => '/a$/','validar_out' => '/b$/',
		 'value' => 'La iniciativa ha sido aprobada (DIC)'],
		
		['validar_in' => '/a$/','validar_out' => '/c$/',
		 'value' => 'La iniciativa presenta observaciones (DIC)'],
		
		['validar_in' => '/b$/','validar_out' => '/d$/',
		 'value' => 'La iniciativa ha sido aprobada (EI)'],
		
		['validar_in' => '/b$/','validar_out' => '/e$/',
		 'value' => 'La iniciativa presenta observaciones (EI)'],
		
		['validar_in' => '/d$/','validar_out' => '/f$/',
		 'value' => 'Iniciativa Publicada']
	];

    public function get_estado($iniciativa){
    	$cadena = $iniciativa->get_estado();
    	foreach(PublicacionIniciativasController::$tabla_estados as $estado){
    		if(preg_match($estado['validar_out'], $cadena)){
    			return $estado['value'];
    		}
    	}
    }

    public function set_estado($iniciativa, $nuevo_estado){
    	echo 'estado_inicial: '.$iniciativa->estado.'<br>'.
    	'nuevo_estado: '.$nuevo_estado.'<br>';
    	if(strlen($nuevo_estado) != 1) return false;
    	$estado_actual = $iniciativa->get_estado();
    	foreach(PublicacionIniciativasController::$tabla_estados as $estado){
    		if(preg_match($estado['validar_out'], $nuevo_estado)){
    			if(preg_match($estado['validar_in'], $estado_actual)){
    				$iniciativa->add_estado($nuevo_estado);
    				echo 'la maquina ha cambiado de estado con exito a: '.$nuevo_estado.' desde: '.$iniciativa->estado;
    				return true;
    			}	
    		}
    	}
    	echo 'la maquina no ha podido cambiar al estado: '.$nuevo_estado.' desde: '.$iniciativa->estado;
    	return false;
    }
}
