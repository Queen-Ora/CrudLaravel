<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('insert') }}" method="POST">
    @csrf
    <input type="text" name="name">
    <input type="text" name="email">
    <input type="password" name="password">
    <input type="hidden" name="role" value="1">
    <input type="submit" value="S'inscrire">
    </form>
</body>
</html>