<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class MustBeRealAdmin
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
        if (auth()->user()->email !== "julian@gmail.com") {
            return redirect('/admin')->with('info', 'You are not real admin!');
        }
        return $next($request);
    }
}
