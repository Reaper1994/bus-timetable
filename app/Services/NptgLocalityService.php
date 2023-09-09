<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\NptgLocality;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class NptgLocalityService
{
    /**
     * Insert NptgLocalities in the database after validation.
     *
     * @param array $nptgLocalities An array of NptgLocalities data to be inserted.
     *
     * @return void
     * 
     * @throws InvalidArgumentException If validation fails.
     */
    public function insertNptgLocalities($nptgLocalities): void
    {
        foreach ($nptgLocalities as $localityData) {
            $localityReference = (string) $localityData->NptgLocalityRef;
            $localityName = (string) $localityData->LocalityName;

            // Define validation rules
            $rules = [
                'locality_reference' => 'required|string|max:255',
                'locality_name' => 'required|string|max:255',
            ];

            // Create a validator instance
            $validator = Validator::make([
                'locality_reference' => $localityReference,
                'locality_name' => $localityName,
            ], $rules);

            // Check if validation fails
            if ($validator->fails()) {
                throw new InvalidArgumentException("Invalid locality data.");
            }

            NptgLocality::firstOrCreate([
                'locality_reference' => $localityReference,
            ], [
                'locality_name' => $localityName,
                // Map other attributes to columns if needed
            ]);
        }
    }
}
