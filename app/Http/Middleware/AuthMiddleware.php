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
            return throw new \Exception('Not authorized.');
        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return throw new \Exception('Not authorized.');
        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {
            return throw new \Exception('Not authorized.');
        }catch(\Exception $e){
            return throw new \Exception('Not authorized.');
        }
        return $next($request);
    }
}
