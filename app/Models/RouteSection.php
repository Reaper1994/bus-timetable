<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RouteSection extends Model
{
    use HasFactory;

    protected $fillable =  ['route_section_id', 'from_stop_point_reference', 'to_stop_point_reference'];

    public function routes()
    {
        return $this->hasMany(Route::class,'route_section_reference', 'route_section_id');
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
