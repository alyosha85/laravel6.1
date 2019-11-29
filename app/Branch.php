<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    public function company ()
    {
        return $this->hasOne(Company::class);
    }
}
