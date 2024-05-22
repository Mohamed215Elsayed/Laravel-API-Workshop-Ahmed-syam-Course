<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Ramsey\Uuid\Uuid;
class RequestId
{
    public function handle(Request $request, Closure $next): Response
    {
    $uuid = $request->headers->get('X-Request-ID');
        if (is_null($uuid)) {
            $uuid = Uuid::uuid4()->toString();
            $request->headers->set('X-Request-ID', $uuid);
        $response = $next($request);
        $response->headers->set('X-Request-ID', $uuid);
        return $response; 
    }
    }
}
