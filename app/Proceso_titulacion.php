<?php

namespace Workflow;

use Illuminate\Database\Eloquent\Model;

class Proceso_titulacion extends Model
{
    //
    public function iniciativas(){
    	return $this->belongsToMany('Workflow\Iniciativa');
    }
}
