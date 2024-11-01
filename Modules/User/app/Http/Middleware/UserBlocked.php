<?php

namespace Modules\User\Http\Middleware;

use App\Traits\ApiResponse;
use Closure;
use Illuminate\Http\Request;
use Modules\User\Enums\UserStatus;

class UserBlocked
{
    use ApiResponse;
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        $guard = $request->expectsJson() ? 'api' : 'web';

        $checker = auth($guard)->check() && auth($guard)->user()->status === UserStatus::Blocked;

        if ($checker) {
            auth($guard)->logout();
            return $request->expectsJson() ?
                response()->json($this->sendError('the user is blocked')) :
                redirect()->route('login')->with('warning', trans('user.blocked'));
        }

        return $next($request);
    }
}