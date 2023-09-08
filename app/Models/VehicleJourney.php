<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleJourney extends Model
{
    use HasFactory;

    protected $fillable = ['journey_pattern_id', 'service_code_reference', 'destination', 'direction', 'route_reference', 'journy_pattern_section_reference'];

    public function route()
    {
        return $this->belongsTo(Route::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

}
