@extends('master_layout')

@section('title', 'Edit Player')

@section('content')
    <table class="table caption-top table-dark">
        <caption>{{ count($players) }} players</caption>
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nick</th>
            <th scope="col">Name</th>
            <th scope="col">Birth Date</th>
            <th scope="col">Country</th>
            <th scope="col">Team</th>
            <th scope="col">Game</th>
            <th scope="col">Roles</th>
            <th scope="col">MVP Count</th>
            <th scope="col">Won Tournament Count</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($players as $player)
            <tr>
                <th scope="row">{{ $player->id }}</th>
                <td>{{ $player->nick }}</td>
                <td>{{ $player->name }}</td>
                <td>{{ $player->birth_date }}</td>
                <td>{{ $player->country->name ?? "No Country" }}</td>
                <td>{{ $player->team->name ?? "No Team" }}</td>
                <td>{{ $player->game->name ?? "No Game" }}</td>
                <td>{{ $player->roles->pluck('name') }}</td>
                <td>{{ $player->mvp_count }}</td>
                <td>{{ $player->won_tournament_count }}</td>
                <td><a href="/players/{{ $player->id }}/edit">Edit</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
