<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RouteSection extends Model
{
    use HasFactory;

    protected $fillable =  ['route_section_id', 'from_stop_point_reference', 'to_stop_point_reference'];

    public function route()
    {
        return $this->belongsTo(Route::class);
    }

    public function stop()
    {
        return $this->belongsTo(Stop::class);
    }
}
