<?php

use Illuminate\Database\Seeder;
use \Workflow\Proceso_titulacion;

class TitulacionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $t = Proceso_titulacion::create([
            'nombre' => 'Proceso de Titulacion 1º Semestre 2018',
            'estado' => '',
        ]);
        $t->save();
    }
}
