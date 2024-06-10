<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Middleware\CheckAdmin;
use App\Http\Middleware\CheckExpert;
return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Define middleware aliases
        $middleware->alias([
            'redirectIfAuthenticated' => \App\Http\Middleware\RedirectIfAuthenticated::class,
            'checkAdmin' => \App\Http\Middleware\CheckAdmin::class,
            'checkExpert' => \App\Http\Middleware\CheckExpert::class
        ]);;
        
       
    
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
