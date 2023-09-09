<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
    use HasFactory;

    protected $fillable = ['operator_code', 'national_operator_code', 'operator_short_name', 'licence_number'];

    public function routes()
    {
        return $this->hasMany(Route::class);
    }
    
}
