<?php

namespace Workflow;

use Illuminate\Database\Eloquent\Model;

class Key extends Model
{
    //

	public function roles(){
		return $this->belongsToMany('Workflow\Role');
	}

}
