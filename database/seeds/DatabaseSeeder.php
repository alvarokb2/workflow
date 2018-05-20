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
        echo "creando usuarios de prueba.\n";
        $user1 = User::new_user('123', '123@123.123', '123123');
        $user2 = User::new_user('pipe', 'pipe@123.123', '123123');
        $user3 = User::new_user('qwe', 'qwe@qwe.qwe', 'qwe');

        // Creamos los roles de la app
        echo "creando roles.\n";
        /*
        $role1 = Role::add_root_role('Alumnos');
        $role2 = Role::add_root_role('Direccion DIC');
        $role3 = $role2->add_role('Academicos');
        $role4 = $role2->add_role('Profesor_guia');
        $role5 = $role2->add_role('Comision_titulo');
        $role6 = Role::add_root_role('Direccion EI');
        $role7 = Role::add_root_role('Jefe de carrera');
        */
        $role1 = Role::add_root_role('A');
        $role2 = Role::add_root_role('B');
        $role3 = $role1->add_role('C');
        $role4 = $role1->add_role('D');
        $role5 = $role2->add_role('E');
        $role6 = $role3->add_role('F');
        $role7 = $role3->add_role('G');
        $role8 = $role4->add_role('H');
        $role9 = $role5->add_role('I');
        $role10 = $role5->add_role('J');


        // creamos las claves para los roles
        echo "creando permisos\n";
        $key1 = Key::new_key('key 1', 'IniciativaController@index');
        $key2 = Key::new_key('key 2', 'IniciativaController@create');
        $key3 = Key::new_key('key 3', 'IniciativaController@show');

        // asignamos a los roles las claves creadas
        echo "asignando roles a los usuarios\n";
        $user1->roles()->save($role2);
        $user2->roles()->save($role9);
        $user3->roles()->save($role3);
        $user3->roles()->save($role6);


        // asignamos una clave al rol1
        echo "asignando permisos a los roles\n";
        // rama 1
        $role1->keys()->save($key1, ['value' => true]);
        $role1->keys()->save($key3, ['value' => true]);

            $role3->keys()->save($key2, ['value' => true]);
//            $role3->keys()->save($key1, ['value' => true]);

                $role6->keys()->save($key1, ['value' => false]);
                $role6->keys()->save($key3, ['value' => false]);

                $role7->keys()->save($key1, ['value' => true]);
                $role7->keys()->save($key2, ['value' => false]);

            $role4->keys()->save($key3, ['value' => false]);

                $role8->keys()->save($key2, ['value' => true]);

        $role2->keys()->save($key2, ['value' => true]);
        $role2->keys()->save($key1, ['value' => true]);

            $role5->keys()->save($key3, ['value' => false]);

                $role9->keys()->save($key2, ['value' => true]);
                $role9->keys()->save($key1, ['value' => false]);

                $role10->keys()->save($key3, ['value' => true]);
                $role10->keys()->save($key2, ['value' => false]);


        //
        echo "creando iniciativas\n";
        $user1->crear_iniciativa('iniciativa 1', '', '');

    }
}
