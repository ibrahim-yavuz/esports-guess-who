<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
</head>
<body>
<form method="POST" action="/players" enctype="multipart/form-data">
    @csrf
    <input type="text" name="nick" placeholder="Nickname"/><br>
    <input type="text" name="name" placeholder="Name"/><br>
    <input type="date" name="birth_date" placeholder="Birth Date"/><br>
    <select name="country_id">
        @foreach($countries as $country)
            <option value="{{ (int)$country->id }}">{{ $country->name }}</option>
        @endforeach
    </select><br>
    <select name="team_id">
        @foreach($teams as $team)
            <option value="{{ (int)$team->id }}">{{ $team->name }}</option>
        @endforeach
    </select><br>
    <select name="game_id">
        @foreach($games as $game)
            <option value="{{ (int)$game->id }}">{{ $game->name }}</option>
        @endforeach
    </select><br>
    <select name="roles[]" multiple>
        @foreach($roles as $role)
            <option value="{{ (int)$role->id }}">{{ $role->name }}</option>
        @endforeach
    </select><br>
    <input type="number" name="mvp_count" placeholder="MVP Count"/><br>
    <input type="number" name="won_tournament_count" placeholder="Won Tournament"/><br>
    <input type="submit"/>
</form>
</body>
</html>
