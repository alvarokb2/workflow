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
        echo 'borrando usuarios actuales.\n';
        User::whereNotNull('id')->delete();

        echo "creando usuarios de prueba.\n";
        $user1 = User::new_user('123', '123@123.123', '123123');
        $user2 = User::new_user('qwe', 'qwe@qwe.qwe', 'qwe');


        //test role
        $user1->roles()->save(Role::where('name', 'Direccion DIC')->first());
        $user1->roles()->save(Role::where('name', 'Academicos DIC')->first());
        $user2->roles()->save(Role::where('name', 'Direccion EI')->first());
    }
}
