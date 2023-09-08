<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;

    protected $fillable = ['route_id', 'route_description', 'route_section_reference'];

    public function stops()
    {
        return $this->belongsToMany(Stop::class, 'route_stops');
    }

    public function timetable()
    {
        return $this->hasMany(Timetable::class);
    }

    public function busJourneys()
    {
        return $this->hasMany(BusJourney::class);
    }

    public function journeyPatternSections()
    {
        return $this->hasMany(JourneyPatternSection::class);
    }
}
