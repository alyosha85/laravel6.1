<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $guarded = [];
    
    public function company()
    {
        return $this->hasOne(Company::class);
    }
}
