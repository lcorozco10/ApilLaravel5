<?php namespace Myapi\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class isAdmin {

    /**
     * @var Guard
     */
    private $auth;

    public function __construct(Guard $auth){

        $this->auth = $auth;
    }

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
        dd($this->auth->validate());
        //dd($request->all());
        if($this->auth->user()->type=="Admin"){
            return $next($request);
        };
        $this->auth->logout();
        return redirect()->guest('auth/login');
	}

}
