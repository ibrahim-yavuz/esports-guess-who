@extends('master_layout')

@section('title', 'Edit Player')

@section('content')
<form method="POST" action="/players/{{ $player->id }}" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="mb-3">
        <label for="nick" class="form-label">Nickname</label>
        <input class="form-control" id="nick" type="text" name="nick" value="{{ $player->nick }}"/>
    </div>
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input class="form-control" id="name" type="text" name="name" placeholder="Name" value="{{ $player->name }}"/>
    </div>
    <div class="mb-3">
        <label for="birth_date" class="form-label">Birth Date</label>
        <input class="form-control" id="birth_date" type="date" name="birth_date" placeholder="Birth Date" value="{{ \Carbon\Carbon::parse($player->birth_date)->format('Y-m-d') }}"/>
    </div>
    <div class="mb-3">
        <label for="country_id" class="form-label">Country</label>
        <select class="form-select" name="country_id" id="country_id">
            @foreach($countries as $country)
                <option @if($country->id == $player->country_id) selected @endif value="{{ (int)$country->id }}">{{ $country->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="team_id" class="form-label">Team</label>
        <select class="form-select" name="team_id" id="team_id">
            @foreach($teams as $team)
                <option @if($team->id == $player->team_id) selected @endif value="{{ (int)$team->id }}">{{ $team->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="game_id" class="form-label">Game</label>
        <select class="form-select" name="game_id" id="game_id">
            @foreach($games as $game)
                <option value="{{ (int)$game->id }}">{{ $game->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="roles" class="form-label">Roles</label>
        <select name="roles[]" size="10" class="form-select" multiple aria-label="multiple select example" id="roles">
            @foreach($roles as $role)
                <option @if(in_array($role->id, $player->roles->pluck('id')->toArray())) selected @endif value="{{ (int)$role->id }}">{{ $role->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="mvp_count" class="form-label">MVP Count</label>
        <input class="form-control" id="mvp_count" type="number" name="mvp_count" placeholder="MVP Count" value="{{ $player->mvp_count }}" />
    </div>
    <div class="mb-3">
        <label for="won_tournament_count" class="form-label">Won Tournament Count</label>
        <input class="form-control" id="won_tournament_count" type="number" name="won_tournament_count" placeholder="Won Tournament" value="{{ $player->won_tournament_count }}"/><br>
    </div>
    <button class="btn btn-primary" type="submit">Submit form</button>
</form>
@endsection
