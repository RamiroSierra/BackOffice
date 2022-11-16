<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('sport.UpdateSport',$sport) }}" method="post"> @csrf
        nombre <input type="text" name="nombre" value='{{$sport->nombre}}'><br>
        URL <input type="text" name="URL" value='{{$sport->URL}}'><br>
        
        <select name='typeOfResult'>
            <option value="1">Por Set</option>
            <option value="2">Por Tantos</option>
            <option value="3">Por Marca</option>
        </select>
        <input type="submit" value="Registrar">
    </form>
</body>
</html>