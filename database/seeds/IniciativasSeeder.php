<?php

use Illuminate\Database\Seeder;
use Workflow\Iniciativa;

class IniciativasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Iniciativa::crear(1, 1, 'Iniciativa de titulo 1.1');
        Iniciativa::crear(1, 1, 'Iniciativa de titulo 1.2');
        Iniciativa::crear(1, 2, 'Iniciativa de titulo 2.1');
    }
}
