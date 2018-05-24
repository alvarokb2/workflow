<?php

namespace Workflow\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Request;
use Redirect;
use Illuminate\Support\Facades\DB;


class VerifyRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $action = $request->route()->getActionName();
        if (Auth::check()) {
            if ($this->permit($action)) {
                return $next($request);
            }
        }
        $controller = explode('@', $action);
        if (method_exists($controller[0], 'denegated')) {
            return app()->call($controller[0] . '@denegated');
        } else {
            return response('Error');
        }
    }

    public function permit($pattern)
    {
        $permisos = $this->permisos();
        $aux1 = '';
        $aux2 = null;
        foreach ($permisos as $permiso) {
            $r = preg_match('/((?:.*?\\\)*)(' . preg_quote($permiso['pattern']) . ')$/', $pattern);
            if ($r) {
                $aux2 = $aux2 ?: $permiso['owner_id'];
                if ($permiso['owner_id'] != $aux2) {
                    $aux1 = $aux1 . '|';
                    $aux2 = $permiso['owner_id'];
                }
                $aux1 = $aux1 . $permiso['value'];
            }
        }
        $aux1 = $aux1 . '|';
        return preg_match('/^(([10]*0\|)*|\|)$/', $aux1) == 0;
    }


    /**
     * Devuelve un arreglo con todos los permisos que encuentra en sus roles
     * @return array
     */
    public function permisos()
    {
        $keys = array();
        foreach (Auth::User()->roles()->get() as $role) {
            $this->add_keys($role, $keys, $role->id);
        }
        return $keys;
    }

    private function add_keys($role, &$keys, $owner_id)
    {
        if (!is_null($role)) {
            $this->add_keys($role->owner(), $keys, $owner_id);
            foreach ($role->keys()->get() as $key) {
                $value = DB::table('key_role')->where([
                    ['role_id', $key->pivot->role_id],
                    ['key_id', $key->pivot->key_id]
                ])->get()[0]->value;
                $keys[] = ['pattern' => $key->pattern, 'value' => $value, 'role_id' => $key->pivot->role_id, 'owner_id' => $owner_id];
            }
        }
    }
}
