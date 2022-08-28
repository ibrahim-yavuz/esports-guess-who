<?php

namespace App\Console\Commands;

use App\Models\DailyPlayer;
use App\Models\Player;
use Illuminate\Console\Command;

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
        $players = Player::all();
        $player = Player::find(rand(1, count($players)));
        while ($player == null){
            $player = Player::find(rand(1, count($players)));
        }
        $dailyPlayer = new DailyPlayer();
        $dailyPlayer->player_id = $player->id;
        $dailyPlayer->save();

    }
}
