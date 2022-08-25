<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
</head>
<body>
<form method="POST" action="/upload-image" enctype="multipart/form-data">
    @csrf
    <input type="file" name="logo"/><br>
    <input type="text" name="type" placeholder="Type"/><br>
    <input type="submit"/>
</form>
</body>
</html>
