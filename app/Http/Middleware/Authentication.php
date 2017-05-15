<?php

namespace App\Http\Middleware;

use App\Models\Module;
use App\Models\Role;
use App\Models\User;
use App\Models\UserLog;
use Closure;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

class Authentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $exception_routes = ['user.login', 'user.authenticate', 'user.logout'];

        $current_route = Route::currentRouteName();


        if (!in_array($current_route, $exception_routes)) {

            if (!User::isLoggedIn()) {
                return redirect(route('user.login'));
            }
            $user_log = UserLog::create
            (
                [
                    'url' => Request::getRequestUri(),
                    'user_id' => Session::get('user')[0]->id

                ]
            );

        }


        //dd($current_route);
        $exception_routes_more = ['home', 'modules.show', 'modules.update', 'roles.show', 'roles.update'];

        //if (!in_array(Route::currentRouteName(), $exception_routes_more)) {

            //dd($current_route);
            $current_action_id = Module::moduleIdFromName($current_route);
            if ($current_action_id != null) {
                if ($current_action_id->count() > 0) {

                    $allowed_modules = [];
                    foreach (Role::allowedModules(Session::get('user')[0]->role_id) as $module) {
                        $allowed_modules[] = $module->id;
                    }

                    //dd($allowed_modules);

                    if (!in_array($current_action_id->id, $allowed_modules)) {

                        //Session::flash('error', 'You are not allowed to access this module');
                        Session::flash('notify_error', 'You are not allowed to access this module');
                        return redirect()->back();
                    }
                }
            }
            /*else
                {
                    Session::flash('notify_error','You are not allowed to access this module');
                    return redirect()->back();
                }*/
        //}


        return $next($request);
    }


}
