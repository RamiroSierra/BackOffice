<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('standard.UpdateStandard', $standard) }}" method="post"> @csrf
        nombre <input type="text" name="nombre" value='{{ $oda->clients.nombre }}'><br>
        apellido <input type="text" name="apellido" value='{{ $oda->apellido }}'><br>
        alias <input type="text" name="name" value='{{ $oda->name }}'><br>
        email <input type="email" name="email" value='{{ $oda->email }}'><br>
        Password <input type="password" name="password"><br>
        <select name='typeOfClient'>
            <option value="1">Standard</option>
            <option value="2">Vip</option>
        </select>
        <input type="submit" value="Registrar">
</body>
</html>