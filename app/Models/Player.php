<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    protected $dates = ['birth_date'];

    protected $hidden = ['country_id', 'team_id', 'game_id', 'created_at', 'updated_at'];

    public function logo(){
        return $this->belongsTo(Logo::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function team(){
        return $this->belongsTo(Team::class);
    }

    public function game(){
        return $this->belongsTo(Game::class);
    }

    public function roles(){
        return $this->belongsToMany(Role::class, 'player_roles');
    }
}
