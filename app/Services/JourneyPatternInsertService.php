<?php
declare(strict_types=1);

namespace App\Services;

use App\Models\JourneyPattern;
use SimpleXMLElement;

class JourneyPatternInsertService
{
    /**
     * Insert a new journey pattern record into the database.
     *
     * @param SimpleXMLElement $journeyPatternData The data for the journey pattern.
     * @param string $serviceCodeReference The reference to the associated service code.
     * 
     * @todo validation needs to be added
     * 
     * @return void.
     */
    public function insert(SimpleXMLElement $journeyPatternData, string $serviceCodeReference): void
    {
        $journeyPattern = new JourneyPattern();
        $journeyPattern->journey_pattern_id = (string) $journeyPatternData->JourneyPattern->attributes()->id;
        $journeyPattern->service_code_reference = $serviceCodeReference;
        $journeyPattern->direction = (string) $journeyPatternData->JourneyPattern->Direction;
        $journeyPattern->destination = (string) $journeyPatternData->JourneyPattern->DestinationDisplay;
        $journeyPattern->route_reference = (string) $journeyPatternData->JourneyPattern->RouteRef;

        $journeyPattern->save();
    }
}