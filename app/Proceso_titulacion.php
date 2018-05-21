<?php

namespace Workflow;

use Illuminate\Database\Eloquent\Model;

class Proceso_titulacion extends Model
{
    //
    public function iniciativas(){
    	return Iniciativa::all();//$this->hasMany('Workflow\Iniciativa');
    }
}
