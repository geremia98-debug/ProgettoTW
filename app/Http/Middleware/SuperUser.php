<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SuperUser
{

    public function handle(Request $request, Closure $next): Response
    {
        $user=Auth::user();
        if ($user && ($user -> role == 'admin' || $user -> role == 'staff')){
        return $next($request);}
        else {
            return 'non puoi accedere';
        }
    }
}
