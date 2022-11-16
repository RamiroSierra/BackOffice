<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('login.AutenticalUser')}}" method="post"> @csrf
        name <input type="text" name="name"><br>
        email <input type="text" name="email"><br>
        password <input type="text" name="password"><br>
        <div style="display: inline-block">
            <input type="submit" value="Guardar">
        </div>
    </form>
</body>
</html>