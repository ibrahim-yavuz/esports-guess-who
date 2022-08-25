<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
</head>
<body>
<form method="POST" action="/countries" enctype="multipart/form-data">
    @csrf
    <input type="text" name="name" placeholder="Name"/><br>
    <select name="logo_id">
        @foreach($logos as $logo)
            <option value="{{ $logo->id }}" style="background-image: url({{ $logo->logo_url }})">{{ $logo->logo_url }}</option>
        @endforeach
    </select>
    <input type="submit"/>
</form>
</body>
</html>
