<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Application;

class CheckForMaintenanceMode {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	

	public function handle($request, Closure $next)
	{
	    if (Application::getInstance()->isDownForMaintenance() &&
	        !in_array($request->ip(), ['124.107.149.65']))
	    {
	        return response(view('errors.503'), 503);
	    }

	    return $next($request);
	}
}
