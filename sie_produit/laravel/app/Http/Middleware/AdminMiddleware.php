<?php namespace App\Http\Middleware;

use Closure;

class AdminMiddleware {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
        if (!$request->user()->isAdmin_pfe() AND !$request->user()->isAdmin_services()){
            return view('errors.503');
        }
        return $next($request);
	}

}
