<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stop extends Model
{
    use HasFactory;

    protected $fillable = ['atco_code', 'nptg_locality_reference', 'stop_name', 'latitude', 'longitude'];

    public function routes()
    {
        return $this->belongsToMany(Route::class, 'route_stops');
    }

    public function timetable()
    {
        return $this->hasMany(Timetable::class);
    }

    public function nptgLocality()
    {
        return $this->belongsTo(NptgLocality::class);
    }
}
