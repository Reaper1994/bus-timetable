<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleJourney extends Model
{
    use HasFactory;

    protected $fillable = ['journey_pattern_id', 'service_code_reference', 'destination', 'direction', 'route_reference', 'garage_reference','ticket_machine_service_code', 'jurney_code'];

    protected $primaryKey = 'journey_pattern_id';

    // inverse of the relationship with the 'garages' table
    public function garageReference()
    {
        return $this->belongsTo(Garage::class, 'garage_code', 'garage_reference');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_code_reference', 'service_code');
    }

}
