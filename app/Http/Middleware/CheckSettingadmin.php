<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Permissions;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckSettingadmin
{

    use Permissions;

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {

            $per = $this->getpermission(auth()->user()->roles()->get());


            for ($i = 0; $i < count($per); $i++) {
                if ($per[$i] == 'setting_access') {
                    return $next($request);
                }

            }
            return redirect('/dashboard');


        } else {
            return redirect('/');

        }
    }
}
