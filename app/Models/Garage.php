<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Garage extends Model
{
    use HasFactory;

    protected $fillable = ['garage_code', 'garage_name', 'latitude', 'longitude'];

    protected $primaryKey = 'garage_code';

    // Define the relationship with the 'vehicle_journey' table
    public function vehicleJourneys()
    {
        return $this->hasMany(VehicleJourney::class, 'garage_code', 'garage_reference');
    }
}
