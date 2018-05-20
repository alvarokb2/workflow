<?php

use Illuminate\Foundation\Inspiring;

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

Artisan::command('test', function () {

    // eliminamos todas las tablas de la DB
    echo "Eliminando tablas de la DB...\n";
    $tables = DB::select('SHOW TABLES');
    foreach ($tables as $table) {
        $table_array = get_object_vars($table);
        Schema::drop($table_array[key($table_array)]);
    }

    // realizamos la migracion de las tablas
    echo "Migrando la DB...";
    Artisan::call('migrate');

    // creamos un usuario
    //
    echo "Ejecutando DatabaseSeeder...\n";
    $db = new DatabaseSeeder();
    $db->run();

});
