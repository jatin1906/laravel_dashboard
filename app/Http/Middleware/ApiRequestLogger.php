<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ApiRequestLogger
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
        date_default_timezone_set("Asia/Calcutta");
        $userId = Auth::id();
        Log::channel('api')->info('API Request:', [
            'user_id' => $userId, // Optional
            'method' => $request->method(),
            'url' => $request->url(),
            'headers' => json_encode($request->headers->all()),
            'request_data' => $request->all(), // Optional
            'timestamp' => now(),
        ]);
        return $next($request);
    }
}
