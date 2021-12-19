<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;
use Closure;

class AuthMiddleware extends BaseMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();

        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            return response()->json(['error' => true, 'message' => 'Token has expired.']);
        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return response()->json(['error' => true, 'message' => 'Token is invalid.']);
        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {
            return response()->json(['error' => true, 'message' => 'Token has an exception.']);
        }catch(\Exception $e){
            return response()->json(['error' => true, 'message' => 'Please, login again.']);
        }
        return $next($request);
    }
}
