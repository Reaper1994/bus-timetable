<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NptgLocality extends Model
{
    use HasFactory;

    protected $fillable = ['locality_reference', 'locality_name'];

    public function stops()
    {
        return $this->hasMany(Stop::class);
    }
}
