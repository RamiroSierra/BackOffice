<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('user.UpdateUser',$userr->id)}}" method="post"> @csrf
        nombre <input type="text" name="nombre" value='{{$userr->clientN}}'><br>
        apellido <input type="text" name="apellido" value='{{$userr->clientA}}'><br>
        alias <input type="text" name="name" value='{{$userr->userN}}'><br>
        email <input type="email" name="email" value='{{$userr->userE}}'><br>
        Password <input type="password" name="password"><br>
        <select name='typeOfClient'>
            <option value="1">Standard</option>
            <option value="2">Vip</option>
        </select>
        <input type="submit" value="Registrar">
    </form>
</body>
</html>