<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    protected $guarded = [];
    
    public function company()
    {
        return $this->hasOne(Company::class);
    }
}
