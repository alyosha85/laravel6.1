<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactReason extends Model
{
    protected $guarded = [];
    
    public function communication()
    {
        return $this->hasOne(Communication::class);
    }
}
