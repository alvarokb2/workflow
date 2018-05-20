<?php

namespace Workflow\Http\Middleware;

use Closure;
use Auth;
use Redirect;

class VerifyRole
{
    
    
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $exception = false;
    
        $action = $request->route()->getActionName();
        if(false){
        //if( Auth::user()->permit($action)) {    
        
        }
        else
        {
            if($exception){
                $controller = explode('@', $action);
                app()->call($controller[0].'@denegated');    
            }
            else{
                return Redirect::back();
            }
        }
        return $next($request);
    
    }

    private function permit(){

    }
}
