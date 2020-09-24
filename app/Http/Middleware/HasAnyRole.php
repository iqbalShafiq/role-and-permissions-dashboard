<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class HasAnyRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $roles = Role::get();

        if (auth()->check()) {
            if ($request->user()->hasAnyRole($roles)) {
                return $next($request);
            } else {
                abort(403);
            }
        } else {
            abort(404);
        }
    }
}
