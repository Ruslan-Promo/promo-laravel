<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SetLanguage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $locale = App::getLocale();
        if ($request->session()->has('locale'))
        {
            $locale = $request->session()->get('locale');
        }
        App::setLocale($locale);
        return $next($request);
    }
}
