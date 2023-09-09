<?php
declare(strict_types=1);

namespace App\Services;

use App\Models\RouteSection;

class RouteSectionService
{
    /**
     * Insert RouteSections data in the database.
     *
     * @param array $routeSections An array of routeSections data to be inserted.
     *
     * @todo validation needs to be added
     * 
     * @return void
     */
    public function insertRouteSections($routeSections): void
    {
        // Map data for RouteSection
        foreach ($routeSections as $routeSectionData) {
            $routeStop = new RouteSection();
            $routeStop->route_section_id = (string) $routeSectionData->attributes()->id;
            $routeStop->from_stop_point_reference = (string) $routeSectionData->RouteLink->From->StopPointRef;
            $routeStop->to_stop_point_reference = (string) $routeSectionData->RouteLink->To->StopPointRef;
            // Map other attributes to columns

            $routeStop->save();
        }
    }
}