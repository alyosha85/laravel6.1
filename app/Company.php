<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
        use SoftDeletes;
        protected $guarded = [];
    
    public function branch() 
    {
        return $this->belongsTo(Branch::class);
    }
    public function status()
    {
        return $this->belongsTo(Status::class);
    }
    public function state()
    {
        return $this->belongsTo(State::class);
    }
    public function cities()
    {
        return $this->belongsToMany(City::class);
    }
    public function sections()
    {
        return $this->belongsToMany(Section::class);
    }
    public function professions()
    {
        return $this->belongsToMany(Profession::class);
    }
    public function title()
    {
        return $this->belongsTo(Title::class);
    }
    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }
    public function communications()
    {
        return $this->hasMany(Communication::class);
    }
    public function user()
    {
        return $this->hasOne(User::class,'id','created_by');
    }

}

