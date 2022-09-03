<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Game;
use App\Models\Player;
use App\Models\PlayerRole;
use App\Models\Role;
use App\Models\Team;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {

        dd("çöp akif");
        $players = Player::all();
        return view('player.list', compact('players'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $countries = Country::all();
        $games = Game::all();
        $teams = Team::all();
        $roles = Role::all();
        return view('player.create', compact('countries', 'roles', 'games', 'teams'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $player = new Player();
        $this->updatePlayer($request, $player);

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function show(Player $player)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Player $player)
    {
        $countries = Country::all();
        $teams = Team::all();
        $roles = Role::all();
        $games = Game::all();
        return view('player.edit', compact('player', 'countries', 'teams', 'roles', 'games'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Player $player)
    {
        $this->updatePlayer($request, $player);

        return redirect()->route('players.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function destroy(Player $player)
    {
        //
    }

    /**
     * @param Request $request
     * @param Player $player
     * @return void
     */
    public function updatePlayer(Request $request, Player $player): void
    {
        $player->nick = $request->nick;
        $player->name = $request->name;
        $player->birth_date = $request->birth_date;
        $player->country_id = $request->country_id;
        $player->team_id = $request->team_id;
        $player->game_id = $request->game_id;
        $player->mvp_count = $request->mvp_count;
        $player->won_tournament_count = $request->won_tournament_count;
        $player->save();
        $player->roles()->sync($request->roles);
    }
}
