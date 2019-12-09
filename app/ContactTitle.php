<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactTitle extends Model
{
    protected $guarded = [];
    
    public function contact ()
    {
        return $this->hasOne(Contact::class);
    }
}
