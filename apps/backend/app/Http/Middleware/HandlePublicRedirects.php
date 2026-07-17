<?php

namespace App\Http\Middleware;

use App\Support\PublicRedirectRegistry;
use App\Support\PublicRedirectUrl;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HandlePublicRedirects
{
    public function handle(Request $request, Closure $next): Response
    {
        if (! in_array($request->method(), ['GET', 'HEAD'], true)) {
            return $next($request);
        }

        $sourcePath = PublicRedirectUrl::normalizeRequestPath($request);
        if (PublicRedirectUrl::isProtected($sourcePath)) {
            return $next($request);
        }

        $target = PublicRedirectRegistry::target($sourcePath);
        if ($target === null) {
            return $next($request);
        }

        return redirect()->away(PublicRedirectUrl::destination($target, $request), 301);
    }
}
