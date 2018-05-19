<?php

use Illuminate\Database\Seeder;
use Workflow\Role;
use Workflow\Key;
use Workflow\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $user1 = User::create([
            'name'  =>  '123',
            'email' =>  '123@123.123',
            'password'  =>  bcrypt('123123'),
        ]);
        $user1->save();

		$user2 = User::create([
            'name'  =>  'pipe',
            'email' =>  'pipe@123.123',
            'password'  =>  bcrypt('123123'),
        ]);
		$user2->save();
		
		$role1 = Role::add_root_role('Alumnos');
		$role2 = Role::add_root_role('Direccion DIC');
		$role3 = $role2->add_role('Academicos');
		$role4 = $role2->add_role('Profesor_guia');
		$role5 = $role2->add_role('Comision_titulo');
		$role6 = Role::add_root_role('Direccion EI');
		$role7 = Role::add_root_role('Jefe de carrera');
				


		$key1 = Key::create([
			'name' => 'key 1',
			'pattern' => ''
		]);
		$key1->save();

		$key2 = Key::create([	
			'name' => 'key 2',
			'pattern' => ''
		]);
		$key2->save();
		
		$key3 = Key::create([
			'name' => 'key 3',
			'pattern' => ''
		]);
		$key3->save();

		$user1->roles()->save($role1);
		$user2->roles()->save($role3);
		$user1->roles()->save($role2);
		
		$role1->keys()->save($key1, ['value' => true]);
			
    }
}
