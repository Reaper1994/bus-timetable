<?php
declare(strict_types=1);

namespace App\Services;

use App\Models\Service;

class ServiceInsertService
{
    /**
     * Insert a new service data  into the database.
     *
     * @param \SimpleXMLElement $serviceData
     *
     * @return \App\Models\Service
     */
    public function insert($serviceData)
    {
        $service = new Service();
        $service->service_code = (string) $serviceData->ServiceCode;
        $service->operating_start_day = (string) $serviceData->OperatingPeriod->StartDate;
        $service->opearting_end_day = (string) $serviceData->OperatingPeriod->EndDate;
        $service->operator_reference = (integer) explode('_', (string) $serviceData->RegisteredOperatorRef)[1];
        $service->mode = (string) $serviceData->Mode;

        $service->save();

        return $service;
    }
}