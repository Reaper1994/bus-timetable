<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    
    protected $fillable = ['service_code', 'operating_start_day', 'opearting_end_day', 'operator_reference', 'mode'];

    // inverse of the relationship with the 'operators' table
    public function operatorReference()
    {
        return $this->belongsTo(Operator::class, 'operator_reference', 'operator_code');
    }

    public function journeyPatterns()
    {
        return $this->hasMany(JourneyPattern::class, 'service_code_reference', 'service_code');
    }

    public function vehicleJourneys()
    {
        return $this->hasMany(VehicleJourney::class, 'service_code_reference', 'service_code');
    }
    
}
