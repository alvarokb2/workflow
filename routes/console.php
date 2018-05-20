<?php

use Illuminate\Foundation\Inspiring;
use Workflow\User;
use Workflow\Role;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

Artisan::command('test {--reset_db}', function ($reset_db) {

    if ($reset_db) {
        // eliminamos todas las tablas de la DB
        echo "Eliminando tablas de la DB...\n";
        $tables = DB::select('SHOW TABLES');
        foreach ($tables as $table) {
            $table_array = get_object_vars($table);
            Schema::drop($table_array[key($table_array)]);
        }

        // realizamos la migracion de las tablas
        echo "Migrando la DB...\n";
        Artisan::call('migrate');

        // creamos un usuario
        //
        echo "Ejecutando DatabaseSeeder...\n";
        $db = new DatabaseSeeder();
        $db->run();
    }

    $user1 = User::find(1);
    echo "- user: " . $user1->name . "\n";
//    echo "  - roles():\n";
//    print_roles($user1->roles(), 2);
    echo "  - permisos():\n";
    print_permisos($user1->permisos(), 2);

});

function print_roles($roles, $level = 0)
{
    foreach ($roles->get() as $role) {
        echo str_repeat(" ", ($level * 2)) . "- role: " . $role->name . "\n";
        print_permisos($role->keys()->get(), $level + 1);
        print_roles($role->roles(), $level + 1);
    }
}

function print_permisos($keys, $level = 0)
{
    foreach ($keys as $key) {
        echo str_repeat(" ", ($level * 2)) . "- permiso: " . json_encode($key) . "\n";
    }
}
