<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class AuthenticateWeb
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
        $session = $request->session()->get('user_id');
//        $session = $request->session()->has('user_id');

        $user = User::find($session);

        if($session) {

            $request->merge(['user' => $user ]);
            return $next($request);

        } else {
            return redirect()->route('login');
        }
    }
}
