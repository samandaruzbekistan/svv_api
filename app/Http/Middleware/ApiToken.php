<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class ApiToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\JsonResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->has('bearerToken')){
            return response()->json([
                'message' => 'token not found'
            ]);
        }
        else{
            $user = User::where('api_token', $request->bearerToken())->first();
            if (empty($user)) return response()->json(['message' => 'token is invalid']);
            return $next($request);
        }

    }
}
