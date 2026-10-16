<?php

namespace App\Routing;

use Illuminate\Http\Request;
use Illuminate\Routing\CompiledRouteCollection;

/**
 * Compiled (route-cached) route collection that keeps "/" working when the
 * application is served from a sub-directory.
 *
 * CompiledRouteCollection trims the trailing slash off REQUEST_URI before
 * handing the request to Symfony's compiled matcher, so "/about/" matches the
 * "/about" route. Below the document root — e.g. Wamp serving
 * "http://localhost/laravel%20projects/fertility/public/" — trimming the root
 * URI ("/…/public/" → "/…/public") also removes the slash that terminates the
 * base path. Symfony can then no longer detect the base URL, PATH_INFO comes
 * back as the whole request URI, no route matches and Laravel answers the home
 * page with "405 Method Not Allowed" (offering only HEAD as the alternate
 * verb). Production, mounted at the document root, is unaffected either way.
 *
 * The trim is therefore only kept when it cannot lose the base path. Without
 * route caching the plain matcher never trims the URI, so this only ever
 * matters after "php artisan optimize".
 *
 * @see \App\Routing\Router::setCompiledRoutes()
 */
class SubdirectoryCompiledRouteCollection extends CompiledRouteCollection
{
    /**
     * Get a cloned instance of the given request without any trailing slash on the URI.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Request
     */
    protected function requestWithoutTrailingSlash(Request $request)
    {
        $pathInfo = $request->getPathInfo();

        // The application root ("/") already matches the compiled "/" route,
        // and paths without a trailing slash are unaffected by the trim.
        if ($pathInfo === '/' || ! str_ends_with($pathInfo, '/')) {
            return $request;
        }

        $trimmed = parent::requestWithoutTrailingSlash($request);

        // At the document root there is no base path that could be lost, so the
        // stock trim is always safe.
        if ($request->getBaseUrl() === '') {
            return $trimmed;
        }

        // In a sub-directory install the trim may have removed the slash that
        // ends the base path: Symfony then fails to detect the base URL and the
        // path info comes back as the entire request URI (it would never match
        // a route). Keep the original request in that case.
        $rawPath = explode('?', (string) $trimmed->server->get('REQUEST_URI'), 2)[0];

        if (in_array($trimmed->getPathInfo(), [$rawPath, rawurldecode($rawPath)], true)) {
            return $request;
        }

        return $trimmed;
    }
}
