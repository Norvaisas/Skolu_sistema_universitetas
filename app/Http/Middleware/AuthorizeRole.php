<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Closure;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthorizeRole
{
    public function handle(Request $request, Closure $next, ...$role_ids): Response
    {
        $userRoleId = auth()->user()->role_id;

        // Check if the user's role_id matches any of the allowed role IDs
        if (!in_array($userRoleId, $role_ids)) {
            return redirect(RouteServiceProvider::HOME)->with('message', 'Negalima pasiekti šio puslapio!');
        }

        return $next($request);
    }
}

