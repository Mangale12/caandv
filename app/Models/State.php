<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\City;
use App\Models\Country;

class State extends Model
{
    use HasFactory;
    public function getCity(){
        return $this->hasMany(City::class);
    }
    public function getCountry(){
        return $this->belongsTo(Country::class,'country_id','id');
    }
}
