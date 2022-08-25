<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
</head>
<body>
<form method="POST" action="/teams" enctype="multipart/form-data">
    @csrf
    <input type="text" name="name" placeholder="Name"/><br>
    <select name="country_id">
        @foreach($countries as $country)
            <option value="{{ (int)$country->id }}">{{ $country->name }}</option>
        @endforeach
    </select><br>
    <select name="logo_id">
        @foreach($logos as $logo)
            <option value="{{ $logo->id }}">{{ $logo->logo_url }}</option>
        @endforeach
    </select><br>
    <input type="submit"/>
</form>
</body>
</html>
