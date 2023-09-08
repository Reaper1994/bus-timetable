<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
    use HasFactory;

    protected $fillable = ['operator_code', 'national_operator_code', 'operator_short_name', 'operator_name_on_licence'];

    public function routes()
    {
        return $this->hasMany(Route::class);
    }
    
}
