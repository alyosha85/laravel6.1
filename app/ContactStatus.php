<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactStatus extends Model
{
    protected $guarded = [];
    
    public function contact ()
    {
        return $this->hasOne(Contact::class);
    }
}
