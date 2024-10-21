<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $languages = config('app.locales');
        $currentLocale = $request->segment(1);

        if (!in_array($currentLocale, $languages))
            $currentLocale = $languages[0] ?? 'ar';

        app()->setLocale($currentLocale);

        URL::defaults(['locale' => $currentLocale]);

        return $next($request);
    }
}