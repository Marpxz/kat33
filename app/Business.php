<?php

namespace Kat33;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    protected $fillable = [
        'name'
    ];
    public function user()
    {
        return $this->hasOne(User::class);
    }
}
