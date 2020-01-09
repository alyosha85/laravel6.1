<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $guarded = [];
    
    public function companies()
    {
        return $this->belongsToMany(Company::class);
    }
}
