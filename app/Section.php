<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $guarded = [];
    
    public function branch ()
    {
        return $this->hasOne(Branch::class);
    }
    public function professions ()
    {
        return $this->hasMany(Profession::class);
    }
}
