<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $guarded = [];
    
    public function companies()
    {
        return $this->belongsToMany(Company::class);
    }
}
