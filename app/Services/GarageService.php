<?php
declare(strict_types=1);

namespace App\Services;

use App\Models\Garage;
use Illuminate\Support\Facades\Validator;

class GarageService
{
    /**
     * Insert Garage data in the database after validation.
     *
     * @param array $garages An array of Garages data to be inserted.
     *
     * @return void
     *
     * @throws InvalidArgumentException If the provided data is invalid.
     */
    public function insertGarages($garages): void
    {
        foreach ($garages as $garageData) {
            $garageCode = (string) $garageData->GarageCode;
            $garageName = (string) $garageData->GarageName;
            $latitude = (float) $garageData->Location->Latitude;
            $longitude = (float) $garageData->Location->Longitude;

            // Define validation rules
            $rules = [
                'garage_code' => 'required|string',
                'garage_name' => 'required|string|max:255',
                'latitude' => 'required|numeric|between:-90,90',
                'longitude' => 'required|numeric|between:-180,180',
            ];

            // Create a validator instance
            $validator = Validator::make([
                'garage_code' => $garageCode,
                'garage_name' => $garageName,
                'latitude' => $latitude,
                'longitude' => $longitude,
            ], $rules);

            // Check if validation fails
            if ($validator->fails()) {
                throw new \InvalidArgumentException("Invalid garage data.");
            }

            Garage::firstOrCreate([
                'garage_code' => $garageCode,
            ], [
                'garage_name' => $garageName,
                'latitude' => $latitude,
                'longitude' => $longitude,
                // Map other attributes to columns if needed and update migrations as well
            ]);
        }
    }
}