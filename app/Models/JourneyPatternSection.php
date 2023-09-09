<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JourneyPatternSection extends Model
{
    use HasFactory;

    protected $fillable = ['journey_pattern_id', 'sequence_number', 'service_code_reference', 'destination', 'direction', 'route_reference'];

    public function route()
    {
        return $this->belongsTo(Route::class, 'route_reference', 'route_id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_code_reference', 'service_code');
    }

    public function fromStopPointReference()
    {
        return $this->belongsTo(Stop::class,'from_stop_point_reference', 'atco_code');
    }

    public function toStopPointReference()
    {
        return $this->belongsTo(Stop::class,'to_stop_point_reference', 'atco_code');
    }
}
