<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class restrictedIp
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
        $restrictedip = ['127.0.0.1'];
        $clientIp = $request->ip();

        if (in_array($clientIp, $restrictedip)) {
            return response()->json(['message' => "Access Denied."], 403);
        }
        return $next($request);
    }
}
