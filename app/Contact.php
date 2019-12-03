<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $guarded = [];
    
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
