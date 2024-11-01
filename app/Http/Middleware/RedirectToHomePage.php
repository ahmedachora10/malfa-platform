<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectToHomePage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!$request->expectsJson() && $request->isMethod('get')) {
            $languages = config('app.locales');
            $currentLocale = $request->segment(1);
            $fullUrl = $request->fullUrl();

            if (!$currentLocale)
                return redirect(status: 301)->to(str($fullUrl)->replaceEnd('/', '')->value() . '/' . app()->getLocale());

            if (!in_array($currentLocale, $languages))
                return redirect(status: 301)->to(str($fullUrl)->replace($currentLocale, '/'. $currentLocale)->value());
        }

        return $next($request);
    }
}
