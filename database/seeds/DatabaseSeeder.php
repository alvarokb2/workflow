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

        // Creamos usuarios de prueba
        $user1 = User::new_user('123', '123@123.123', '123123');
        $user2 = User::new_user('pipe', 'pipe@123.123', '123123');

        // Creamos los roles de la app
        $role1 = Role::add_root_role('Alumnos');
        $role2 = Role::add_root_role('Direccion DIC');
        $role3 = $role2->add_role('Academicos');
        $role4 = $role2->add_role('Profesor_guia');
        $role5 = $role2->add_role('Comision_titulo');
        $role6 = Role::add_root_role('Direccion EI');
        $role7 = Role::add_root_role('Jefe de carrera');

        // creamos las claves para los roles
        $key1 = Key::new_key('key 1', '');
        $key2 = Key::new_key('key 2', '');
        $key3 = Key::new_key('key 3', '');

        // asignamos a los roles las claves creadas
        $user1->roles()->save($role1);
        $user2->roles()->save($role3);
        $user1->roles()->save($role2);


        // asignamos una clave al rol1
        $role1->keys()->save($key1, ['value' => true]);

    }
}
