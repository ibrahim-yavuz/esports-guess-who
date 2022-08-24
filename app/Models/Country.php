<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    public function teams(){
        return $this->hasMany(Team::class);
    }

    public function logo(){
        return $this->hasOne(Logo::class);
    }
}
