<?php

namespace App\Routing;

use Illuminate\Routing\Router as BaseRouter;

/**
 * Router that loads cached routes into a sub-directory aware collection so
 * that "php artisan optimize" (route caching) is also safe when the app is
 * served below the document root.
 *
 * The stock Router hard-codes a plain CompiledRouteCollection, whose trailing
 * slash trim breaks base-URL detection on the home page in a sub-directory —
 * see SubdirectoryCompiledRouteCollection for the full explanation. Routing
 * behaviour is otherwise identical to the framework router.
 */
class Router extends BaseRouter
{
    /**
     * Set the compiled routes collection instance.
     *
     * @param  array  $routes
     * @return void
     */
    public function setCompiledRoutes(array $routes)
    {
        $this->routes = (new SubdirectoryCompiledRouteCollection(
            $routes['compiled'],
            $routes['attributes']
        ))
            ->setRouter($this)
            ->setContainer($this->container);

        $this->container->instance('routes', $this->routes);
    }
}
