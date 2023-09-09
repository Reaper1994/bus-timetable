<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NptgLocality extends Model
{
    use HasFactory;

    protected $fillable = ['locality_reference', 'locality_name'];

    protected $primaryKey = 'locality_reference';

    // Define the relationship with the 'stops' table
    public function stops()
    {
        return $this->hasMany(Stop::class, 'nptg_locality_reference', 'locality_reference');
    }
}
