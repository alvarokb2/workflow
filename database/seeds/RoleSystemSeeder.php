<?php

use Illuminate\Database\Seeder;
use Workflow\Role;
use Workflow\Key;

class RoleSystemSeeder extends Seeder
{
	private static $root = 'Workflow\Http\Controllers\\';

	private static $roles = [
    	1 => ['name' => 'Direccion DIC', 'information' => '', 'name_owner' => null],
    	2 => ['name' => 'Direccion EI',	'information' => '', 'name_owner' => null],
    	3 => ['name' => 'Jefe de Carrera', 'information' => '', 'name_owner' => null],
    	4 => ['name' => 'Academicos DIC', 'information' => '', 'name_owner' => null],
    	5 => ['name' => 'Comision de titulacion', 'information' => '', 'name_owner' => null],
    	6 => ['name' => 'Profesor guia',	'information' => '', 'name_owner' => null],
		7 => ['name' => 'Alumno', 'information' => '', 'name_owner' => null],
	];

    private static $keys = [
    	['name' => 'Actualizar iniciativa', 'pattern' => 'IniciativaController@update'],
    	['name' => 'Eliminar iniciativa', 'pattern' => 'IniciativaController@destroy'],
    	['name' => 'DIC Validar iniciativa', 'pattern' => 'IniciativaController@validar_dic'],
    	['name' => 'EI Validar iniciativa', 'pattern' => 'IniciativaController@validar_ei'],
    	['name' => 'Publicar iniciativa', 'pattern' => 'IniciativaController@publicar'],
	];

	private static $asignaciones = [
		['role_name' => 'Academicos DIC', 'key_pattern' => 'IniciativaController@update', 'value' => true],
		['role_name' => 'Academicos DIC', 'key_pattern' => 'IniciativaController@destroy', 'value' => true],
		['role_name' => 'Direccion DIC', 'key_pattern' => 'IniciativaController@validar_dic', 'value' => true],
		['role_name' => 'Direccion EI', 'key_pattern' => 'IniciativaController@validar_ei', 'value' => true],
		['role_name' => 'Direccion EI', 'key_pattern' => 'IniciativaController@publicar', 'value' => true],
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
//    	Key::whereNotNull('id')->delete();
//    	Role::whereNotNull('id')->delete();

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
