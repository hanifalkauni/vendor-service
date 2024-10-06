<?php

namespace App\Http\Middleware;

use Closure;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Http\JsonResponse;

class AuthenticateVendorService
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
        try {
            // Check if the token is present and valid
            if (! $token = $request->bearerToken()) {
                return new JsonResponse(['error' => 'Token not provided'], 401);
            }

            // Parse and validate the token
            $user = JWTAuth::parseToken()->authenticate();

            if (!$user) {
                return new JsonResponse(['error' => 'User not authenticated'], 401);
            }
        } catch (JWTException $e) {
            // Handle exceptions, such as invalid token or token expired
            return new JsonResponse(['error' => 'Token invalid or expired'], 401);
        }

        // Continue with the request if token is valid
        return $next($request);
    }
}

