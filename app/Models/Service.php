<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['service_code', 'operating_start_day', 'opearting_end_day', 'operator_reference', 'mode'];

    public function routes()
    {
        return $this->hasMany(Route::class);
    }
    
}
