<?php

namespace App\Http\Middleware;

use App\Models\Crest\profile;
use Closure;
use Illuminate\Support\Facades\Auth;

class CompleteProfile
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
    	$profile = profile::where('user_id', Auth::user()->id)->first();
    	if($profile) {
			return $next($request);
		} else {
			return redirect('profiles/create');
		}
    }
}
