<?php

use Illuminate\Database\Seeder;
use Workflow\Role;
use Workflow\Key;

class RoleSystemSeeder extends Seeder
{
	private static $root = 'Workflow\Http\Controllers\\';

	// usar name del padre como id_owner
	private static $roles = [
    	['name' => 'Direccion DIC', 'information' => '',
    	'name_owner' => null],
    	
    	['name' => 'Direccion EI',	'information' => '',
    	'name_owner' => null],
    	
    	['name' => 'Jefe de Carrera', 'information' => '',
    	'name_owner' => null],
    	
    	['name' => 'Academicos DIC', 'information' => '',
    	'name_owner' => null],
    	
    	['name' => 'Comision de titulacion', 'information' => '',
    	'name_owner' => null],
    	
    	['name' => 'Profesor guia',	'information' => '',
    	'name_owner' => null],

		['name' => 'Alumno', 'information' => '',
    	'name_owner' => null],    	
	];

    private static $keys = [
    	['name' => 'Actualizar iniciativa',
    	'pattern' => 'Iniciativa@update'],
    	
    	['name' => 'Eliminar iniciativa',
    	'pattern' => 'Iniciativa@destroy'],
    	
    	['name' => 'DIC Validar iniciativa', 
    	'pattern' => 'Iniciativa@validar_dic'],
    	
    	['name' => 'EI Validar iniciativa',
    	'pattern' => 'Iniciativa@validar_ei'],
    	
    	['name' => 'Publicar iniciativa',
    	'pattern' => 'Iniciativa@publicar'],
	];

	private static $asignaciones = [
		['role_name' => 'Academicos DIC', 'key_pattern' => 'Iniciativa@update',
		'value' => true],
		['role_name' => 'Academicos DIC', 'key_pattern' => 'Iniciativa@destroy',
		'value' => true],
		
		['role_name' => 'Direccion DIC', 'key_pattern' => 'Iniciativa@validar_dic',
		'value' => true],

		['role_name' => 'Direccion EI', 'key_pattern' => 'Iniciativa@validar_ei',
		'value' => true],

		['role_name' => 'Direccion EI', 'key_pattern' => 'Iniciativa@publicar',
		'value' => true],

	];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
//    	DB::table('role_user')->truncate();
//    	DB::table('key_role')->truncate();
    	Key::whereNotNull('id')->delete();
    	Role::whereNotNull('id')->delete();
    	
        $this->register_roles();
        $this->register_keys();
        $this->register_asignaciones();
    }

    public function register_roles(){
    	foreach (RoleSystemSeeder::$roles as $role) {	
        	if($role['name_owner'] != null){
        		$owner = Role::where('name', $role['name_owner'])->first();
        		$owner->add_role($role['name'], $role['information']);
        	}
        	else{
        		Role::add_root_role($role['name'], $role['information']);
        	}
        }
    }

	public function register_keys(){
    	foreach (RoleSystemSeeder::$keys as $key) {	
        	Key::new_key($key['name'], RoleSystemSeeder::$root . $key['pattern']);
        }
    }

    public function register_asignaciones(){
    	foreach (RoleSystemSeeder::$asignaciones as $asignacion){
    		$role = Role::where('name', $asignacion['role_name'])->first();
    		$key = Key::where('pattern', RoleSystemSeeder::$root . $asignacion['key_pattern'] )->first();
    		$role->keys()->save($key, ['value' => $asignacion['value']]);
    	}
    }
}
