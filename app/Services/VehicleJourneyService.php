<?php
declare(strict_types=1);

namespace App\Services;

use App\Models\VehicleJourney;

class VehicleJourneyService
{
    /**
     * Insert vehicle journeys into the database.
     *
     * @param object $vehicleJourneys An array of SimpleXMLElement objects representing vehicle journeys.
     * @return void
     */
    public function insertVehicleJourney($vehicleJourneys): void
    {
        // Map data for VehicleJourneys
        foreach ($vehicleJourneys as $journeyData) {

            $journey = new VehicleJourney();
            $journey->private_code = (string) $journeyData->PrivateCode;
            $journey->ticket_machine_service_code = (int) $journeyData->Operational->TicketMachine->TicketMachineServiceCode;
            $journey->jouney_code = (int) $journeyData->Operational->TicketMachine->JourneyCode;
            $journey->duration = (string) $journeyData->LayoverPoint->Duration;
            $journey->layover_point = (string) $journeyData->LayoverPoint->Name;
            $journey->latitude = (float) $journeyData->LayoverPoint->Location?->Latitude;
            $journey->longitude = (float) $journeyData->LayoverPoint->Location?->Longitude;
            $journey->garage_reference = (string) $journeyData->GarageRef;
            $journey->service_code_reference = (string) $journeyData->ServiceRef;
            $journey->departure_time = (string) $journeyData->DepartureTime;
            
            // Map other attributes to columns if needed

            $journey->save();
        }
    }
}