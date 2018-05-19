<?php

namespace Workflow;

use Illuminate\Database\Eloquent\Model;

class Iniciativa extends Model
{
    //
    public function proceso_titulacion(){
    	return $this->belongsTo('Workflow\Proceso_titulacion');
    }
}
