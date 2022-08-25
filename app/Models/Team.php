<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    public function logo(){
        return $this->belongsTo(Logo::class);
    }

    public function country(){
        return $this->belongsTo(Country::class);
    }
}
