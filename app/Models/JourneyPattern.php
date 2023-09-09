<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JourneyPattern extends Model
{
    use HasFactory;

    protected $fillable = ['journey_pattern_id', 'service_code_reference', 'destination', 'direction', 'route_reference'];

    protected $primaryKey = 'journey_pattern_id';

    public function route()
    {
        return $this->belongsTo(Route::class, 'route_reference', 'route_id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_code_reference', 'service_code');
    }

}
