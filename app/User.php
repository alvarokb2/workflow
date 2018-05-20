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
