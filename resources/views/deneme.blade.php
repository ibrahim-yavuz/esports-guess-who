<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
</head>
<body>
    @foreach($logos as $logo)
        <img src="{{ $logo->logo_url }}" height="50">
    @endforeach
</body>
</html>
