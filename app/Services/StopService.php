<?php
declare(strict_types=1);

namespace App\Services;

use App\Models\Stop;

class StopService
{
    /**
     * Create or update stop points in the database based on ATCO code.
     *
     * @param object $stopPoints An array of SimpleXMLElement objects representing stop points.
     * @return void
     */
    public function createStop($stopPoints): void
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