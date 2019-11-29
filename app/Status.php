<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    public function company ()
    {
        return $this->hasOne(Company::class);
    }
}
