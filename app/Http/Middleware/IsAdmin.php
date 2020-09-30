<?php

namespace App\Http\Middleware;

use App\Helpers\CustomResponse;
use Closure;
use Illuminate\Http\Request;

class IsAdmin
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
        if (!$request->user()->isAdmin()) {
            return CustomResponse::createError('10003');
        }
        return $next($request);
    }
}
