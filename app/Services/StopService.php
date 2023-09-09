<?php
declare(strict_types=1);

namespace App\Services;

use App\Models\Stop;

class StopService
{
    public function createStop($stopPoints)
    {
        foreach ($stopPoints as $stopData) {
             Stop::firstOrCreate([
                'atco_code' => (string) $stopData->AtcoCode,
            ], [
                'stop_name' => (string) $stopData->Descriptor->CommonName,
                'latitude' => (float) $stopData->Place->Location->Latitude,
                'nptg_locality_reference' => (string) $stopData->Place->NptgLocalityRef,
                'longitude' => (float) $stopData->Place->Location->Longitude,
            ]);
        }
    }
}