<?php

namespace App\Http\Middleware;

use Closure;

class TranslatorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $locale = $request->segment(1);

        if( !in_array($locale, config('app.languages')) )
        {
            $segments = $request->segments();

            return redirect(config('app.fallback_locale').'/'.implode('/', $segments));
       }

       \App::setLocale($locale);

        return $next($request);
    }
}

