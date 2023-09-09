<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
    use HasFactory;

    protected $fillable = ['operator_code', 'national_operator_code', 'operator_short_name', 'licence_number'];

    protected $primaryKey = 'operator_code';

    // Define the relationship with the 'services' table
    public function services()
    {
        return $this->hasMany(Service::class, 'operator_reference', 'operator_code');
    }
    
}
