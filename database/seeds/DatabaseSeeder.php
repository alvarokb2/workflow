<?php

use Illuminate\Database\Seeder;
use Workflow\Role;
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
        echo "  - UserSeeder.\n";
        $this->call(UserSeeder::class);
        echo "  - TitulacionesSeeder.\n";
        $this->call(TitulacionesSeeder::class);
        echo "  - IniciativasSeeder.\n";
        $this->call(IniciativasSeeder::class);

        echo "  - RoleSystemSeeder.\n";
        $this->call(RoleSystemSeeder::class);


        User::find(1)->roles()->save(Role::where('name', 'Direccion DIC')->first());
        User::find(1)->roles()->save(Role::where('name', 'Academicos DIC')->first());
        User::find(2)->roles()->save(Role::where('name', 'Direccion EI')->first());
    }
}
