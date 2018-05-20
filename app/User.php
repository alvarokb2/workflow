<?php

namespace Workflow;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function crear_iniciativa($nombre, $descripcion = '', $producto_esperado = '')
    {
        $iniciativa = Iniciativa::crear($this->id, $nombre, $descripcion, $producto_esperado);
        return $iniciativa;
    }

    public function roles()
    {
        return $this->belongsToMany('Workflow\Role');
    }

    public function permit($key)
    {
        $keys = $this->keys();
        return false;
    }

    /**
     * Devuelve un arreglo con todos los permisos que encuentra en sus roles
     * @return array
     */
    public function permisos()
    {
        $keys = array();
        foreach ($this->roles()->get() as $role) {
            $this->add_keys($role, $keys);
        }
        return $keys;
    }

    private function add_keys($role, &$keys)
    {
        if (!is_null($role)) {
            $this->add_keys($role->owner(), $keys);
            foreach ($role->keys()->get() as $key) {
                $value = DB::table('key_role')->where([
                    ['role_id', $key->pivot->role_id],
                    ['key_id', $key->pivot->key_id]
                ])->get()[0]->value;
                $keys[] = ['pattern' => $key->pattern, 'value' => $value];
            }
        }
    }

    public static function new_user($name, $email, $password)
    {
        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),
        ]);
        $user->save();
        return $user;
    }
}
