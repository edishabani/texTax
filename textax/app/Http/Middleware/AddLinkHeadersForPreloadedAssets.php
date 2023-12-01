<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AddLinkHeadersForPreloadedAssets
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        // Add your logic to set link headers here

        return $response;
    }
}
