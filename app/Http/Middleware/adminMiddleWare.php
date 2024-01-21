<?php

namespace App\Http\Middleware;

use App\Models\accountModel;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

use function GuzzleHttp\Promise\all;

class adminMiddleWare
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $account = accountModel::find(session('id_user'));

        if ($account && session('username') && ($account->is_admin == 1 || $account->is_admin == 2)) {
            return $next($request);
        } else {
            return redirect()->intended('/')
                ->with('toastNotAssess', true);
        }
    }
}