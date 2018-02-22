<?php

namespace Kat33;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = [
        'model', 'patent', 'type','kat33_id','business_id'
    ];
    public function kat33()
    {
        return $this->belongsTo(Kat33::Class);
    }
}
