<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Communication extends Model
{
    protected $guarded = [];

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function contact_types()
    {
        return $this->belongsTo(ContactType::class);
    }

}
