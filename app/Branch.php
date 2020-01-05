<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $guarded = [];
    
    public function company ()
    {
        return $this->hasOne(Company::class);
    }
    public function section ()
    {
        return $this->hasOne(Section::class);
    }
}
