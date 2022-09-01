<?php

namespace App\Console\Commands;

use App\Models\DailyPlayer;
use App\Models\Player;
use Illuminate\Console\Command;
use Ramsey\Collection\Collection;

class ChangeDailyPlayerCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'change:player';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $dailyPlayers = DailyPlayer::orderBy('id', 'desc')->get();

        $lastPlayers = [];

        for ($i = 0; $i < ((count($dailyPlayers) < 21) ? count($dailyPlayers) : 21); $i++){
            $lastPlayers[$i] = $dailyPlayers[$i];
        }

        $players = Player::all();
        $player = Player::find(rand(1, count($players)));
        while ($player == null || $this->doesContain($player->id, $lastPlayers)){
            $player = Player::find(rand(1, count($players)));
        }
        $dailyPlayer = new DailyPlayer();
        $dailyPlayer->player_id = $player->id;
        $dailyPlayer->save();

    }

    public function doesContain($id, $dailyPlayers){
        foreach ($dailyPlayers as $dailyPlayer){
            if($id == $dailyPlayer->player_id){
                return true;
            }
        }
        return false;
    }
}
