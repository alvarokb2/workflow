<?php

namespace Workflow;

use Illuminate\Database\Eloquent\Model;

class Key extends Model
{
    //

    protected $fillable = ['name', 'pattern'];

    public function roles()
    {
        return $this->belongsToMany('Workflow\Role')->withTimestamps();
    }

    public static function new_key($name, $pattern)
    {
        $key = Key::create([
            'name' => $name,
            'pattern' => $pattern
        ]);
        $key->save();
        return $key;
    }
}
