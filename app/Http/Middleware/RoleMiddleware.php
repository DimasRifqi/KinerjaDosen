<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
     /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  mixed  ...$roles
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $roles)
    {
        $rolesArray = explode('|', $roles);

        $user = $request->user();

        foreach ($rolesArray as $role) {
            if ($user && $user->hasRole($role)) {
                return $next($request);
            }
        }

        return redirect('/home');
    }

}