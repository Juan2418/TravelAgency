<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function originCity() {
        return $this->belongsTo(City::class, 'origin_city_id');
    }

    public function destinationCity() {
        return $this->belongsTo(City::class, 'destination_city_id');
    }
}
