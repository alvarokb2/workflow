<?php

namespace Workflow;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

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

    public function hasRole($value)
    {
        if (is_array($value)) {
            $r = false;
            foreach ($value as $key){
                $r = $r || $this->hasRole($key);
            }
            return $r;
        } elseif (is_string($value)) {
            if (!is_null($instance = $this->roles()->where('name', $value)->first())) {
                return true;
            }
        } elseif (is_int($value)) {
            if (!is_null($instance = $this->roles()->find($value))) {
                return true;
            }
        }
        return false;
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
