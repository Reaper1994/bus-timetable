<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stop extends Model
{
    use HasFactory;

    protected $fillable = ['atco_code', 'nptg_locality_reference', 'stop_name', 'latitude', 'longitude'];

    protected $primaryKey = 'atco_code';

    // inverse of the relationship with the 'nptg_locality_reference' table
    public function nptgLocalityReference()
    {
        return $this->belongsTo(NptgLocalityReference::class, 'nptg_locality_reference', 'locality_reference');
    }

    public function fromStopPointRouteSections()
    {
        return $this->hasMany(RouteSection::class, 'from_stop_point_reference', 'atco_code');
    }

    public function toStopPointRouteSections()
    {
        return $this->hasMany(RouteSection::class, 'to_stop_point_reference', 'atco_code');
    }

    public function fromJourneyPatterSectionRouteSections()
    {
        return $this->hasMany(JourneyPatternSection::class, 'from_stop_point_reference', 'atco_code');
    }

    public function toJourneyPatterSectionRouteSections()
    {
        return $this->hasMany(JourneyPatternSection::class, 'to_stop_point_reference', 'atco_code');
    }
}
