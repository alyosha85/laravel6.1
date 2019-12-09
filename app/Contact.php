<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $guarded = [];

    public function contact_title()
    {
        return $this->belongsTo(ContactTitle::class);
    }
    public function contact_status()
    {
        return $this->belongsTo(ContactStatus::class);
    }



}