<?php

namespace Workflow;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //

    protected $fillable = [
        'name', 'information', 'id_owner'
    ];

    public function users()
    {
        return $this->belongsToMany('Workflow\User');
    }

    public function keys()
    {
        return $this->belongsToMany('Workflow\Key');
    }

    //FUNCIONES MODELO DE ARBOL

    public function owner()
    {
        return Role::find($this->id_owner);
    }

    public function roles()
    {
        return Role::where('id_owner', $this->id);
    }

    public function add_role($name = '', $information = '')
    {

        //validación pendiente de keys.

        $role = Role::create([
            'name' => $name,
            'id_owner' => $this->id,
            'information' => $information
        ]);
        $role->save();
        return $role;
    }

    public static function add_root_role($name = '', $information = '')
    {

        //validación pendiente de keys.

        $role = Role::create([
            'name' => $name,
            'id_owner' => null,
            'information' => $information
        ]);
        $role->save();
        return $role;
    }

    public function delete_tree()
    {
        $roles = $this->roles();
        foreach ($roles as $role) {
            if ($role->roles()->count() != 0) {
                $role->delete_tree();
            } else {
                $role->delete();
            }
        }
        $this->delete();
    }
}
