<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Http\Controllers\VisitorController;

class TrackVisitor
{
    public function handle(Request $request, Closure $next)
    {
        // Call the store method to track the visitor
        app(VisitorController::class)->store($request);

        return $next($request);
    }
}
