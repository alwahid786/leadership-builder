<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $type)
    {
        // $user = $request->user();
        // $user_roles = $user->type;
        // dd($user_roles);

        if (Auth::user()->type === $type) {
            return $next($request);
        }
        // if (!in_array($request->user()->type, $roles)) {
        //     return redirect()->route('login');
        // }
        return redirect('/');
    }
}
