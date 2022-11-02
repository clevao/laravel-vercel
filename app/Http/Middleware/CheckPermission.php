<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        
    	$actions = $request->route()->getAction();
        $routeFunction = isset($actions['function']) ? $actions['function'] : null;
        $routeAction = isset($actions['action']) ? $actions['action'] : array();

        $u = auth('jwt')->user();

        $granted = false;

        if(self::isAdmin($u)){
            return $next($request);
        }
        
        foreach($u->permissions as $p) {
            $userFunction = strtoupper($p['function']);
            
            if($userFunction == $routeFunction){

                $strUserAction = isset($p['permissions']) ? $p['permissions'] : null;
                
                $userActions = explode(',', $p['permissions']);
                
                foreach($routeAction as $a){
                    if(in_array($a, $userActions))
                        return $next($request);
                }
            }
        }

        return response()->json(['error' => 'You dont have grant to this action'], 403);
    }

    private function isAdmin($user) {
        foreach($user->permissions as $permission) {
            if(strtoupper($permission['function']) == 'ADMIN')
                return true;
        }

        return false;
    }
}
