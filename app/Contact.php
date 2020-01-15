<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    protected $guarded = [];

    use SoftDeletes;

    public function contact_title()
    {
        return $this->belongsTo(ContactTitle::class);
    }
    public function contact_status()
    {
        return $this->belongsTo(ContactStatus::class);
    }
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    public function communications()
    {
        return $this->hasMany(Communication::class);
    }



}