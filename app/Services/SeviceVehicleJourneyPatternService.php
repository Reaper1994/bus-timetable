<?php
declare(strict_types=1);

namespace App\Services;

use App\Services\ServiceInsertService;
use App\Services\JourneyPatternInsertService;

class SeviceVehicleJourneyPatternService
{
    private $serviceInsertService;
    private $journeyPatternInsertService;

    public function __construct(
        ServiceInsertService $serviceInsertService,
        JourneyPatternInsertService $journeyPatternInsertService)
    {
        $this->serviceInsertService = $serviceInsertService;
        $this->journeyPatternInsertService = $journeyPatternInsertService;
    }

    /**
     * Insert Services data into the database.
     *
     * @param array $services An array of service data to be inserted.
     *
     * @return void
     */
    public function insertServicesJourneyPattern($services): void
    {
        // Map data for Services
        foreach ($services as $serviceData) {
            // Insert Service
            $service = $this->serviceInsertService->insert($serviceData);

            // Insert Journey Patterns
            foreach ($serviceData->StandardService as $journeyPatternData) {
                $this->journeyPatternInsertService->insert($journeyPatternData, $service->service_code);
            }
        }
    }
}