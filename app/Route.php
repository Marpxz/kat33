<?php

namespace Kat33;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    protected $fillable = [
        'identification', 'start', 'end','observation','pic','business_id'
    ];
}
