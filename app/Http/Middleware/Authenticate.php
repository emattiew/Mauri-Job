<?php

namespace App\Http\Middleware;


use Illuminate\Http\Request;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Symfony\Component\HttpFoundation\Response;

class Authenticate extends Middleware
{
    /**
     * Handle an incoming request.
     *
     * 
     */
    public function redirectTo(Request $request): ?string
    {
        return $request->expectsJson()? null : route('account.login');
    }
}
