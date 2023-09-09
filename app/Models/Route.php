<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;

    protected $fillable = ['route_id', 'route_description', 'route_section_reference'];

    public function journeyPattern()
    {
        return $this->belongsTo(JourneyPattern::class, 'route_reference', 'route_id');
    }

    public function routeSectionReference()
    {
        return $this->belongsTo(RouteSection::class,'route_section_reference', 'route_section_id');
    }
}
