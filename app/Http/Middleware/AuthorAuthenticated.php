<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthorAuthenticated
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
        if( Auth::check() )
        {
            /** @var User $user */
            $user = Auth::user();

            // if user is author take him to his dashboard
            if ( $user->hasRole('author') ) {
                return $next($request);
            } else {
                return redirect(route('homepage'));
            }
        }

        abort(403);  // permission denied error
    }
}
