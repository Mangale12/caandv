<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\City;
use App\Models\State;
class Country extends Model
{
    use HasFactory;
    public function getCity(){
        return $this->hasMAny(City::class);
    }
    public function getState(){
        return $this->hasMany(State::class);
    }

}
