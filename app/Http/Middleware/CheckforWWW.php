<?php namespace App\Http\Middleware;

use Closure;

class CheckforWWW {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		/*
		if (substr($request->header('host'), 0, 4) !== 'www.') {
			$request->headers->set('host', 'www.' . $request->header('host'));
			return redirect()->to($request->path());
		}
		*/
		return $next($request);
	}

}
