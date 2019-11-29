<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function companies()
    {
        return $this->belongsToMany(Company::class);
    }
}
