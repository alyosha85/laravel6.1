<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function branch() 
    {
        return $this->belongsTO(Branch::class);
    }
    public function status()
    {
        return $this->belongsTo(Status::class);
    }
    public function cities()
    {
        return $this->belongsToMany(City::class);
    }
    public function professions()
    {
        return $this->belongsToMany(Profession::class);
    }
}

