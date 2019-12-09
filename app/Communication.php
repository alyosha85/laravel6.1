<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Communication extends Model
{
    protected $guarded = [];

    public function contact_types()
    {
        return $this->belongsToMany(ContactType::class);
    }
}
