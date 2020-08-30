<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
           $route = $request->route();
           
           switch ($route) {
               case $route->named('praticien.home'):
                    return redirect()->route('praticien.login.form');
                   break;

                case $route->named('structure.home'):
                    return redirect()->route('structure.login.form');
                    break;
               
                case $route->named('patient.home'):
                    return redirect()->route('structure.login.form');
                    break;
           }
        }
    }
}
