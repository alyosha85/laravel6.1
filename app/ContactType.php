<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactType extends Model
{
    protected $guarded = [];
    
    public function communications()
    {
        return $this->belongsToMany(Communication::class);
    }
}
