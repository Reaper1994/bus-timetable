<?php
declare(strict_types=1);

namespace App\Services;

use App\Models\Route;

class RouteService
{
    /**
     * Insert Route data in the database.
     *
     * @param array $routes An array of Garages data to be inserted.
     *
     * @return void
     */
    public function insertRoutes($routes): void
    {
        // Map data for Route
        foreach ($routes as $routeData) {
            $route = new Route();
            $route->route_id = (string) $routeData->PrivateCode;
            $route->route_description = (string) $routeData->Description;
            $route->route_section_reference = (string) $routeData->RouteSectionRef;
            // Map other attributes to columns

            $route->save();
        }
    }
}