<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthorAuthenticated​
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
