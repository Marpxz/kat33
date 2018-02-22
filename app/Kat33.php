<?php

namespace Kat33;

use Illuminate\Database\Eloquent\Model;

class Kat33 extends Model
{
    protected $fillable = [
        'simcard','positionLA','positionLO','speed','status','imei','business_id'
    ];
    public function vehicle()
    {
        $this->hasOne(Vehicle::class);
    }
}
