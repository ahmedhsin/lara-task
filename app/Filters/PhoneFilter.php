<?php

namespace App\Filters;

use Closure;

class PhoneFilter
{
    public function handle($request, Closure $next)
    {
        if (request()->filled('phone')) {
            return $next($request)->where('phone', 'LIKE', '%' . request('phone') . '%');
        }

        return $next($request);
    }
}
