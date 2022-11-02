<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('technical.UpdateTechnical', $technical->id) }}" method="post"> @csrf
        <div style="display: inline-block">
            Nombre <input type="text" name="nombre" value='{{ $technical->nombre }}'><br>
            Apellido <input type="text" name="apellido" value='{{ $technical->apellido }}'><br>
        </div>
        <div style="display: inline-block">
            <input type="submit" value="Guardar">
        </div>
    </form>
</body>
</html>