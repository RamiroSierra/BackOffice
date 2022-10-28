<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('sport.update', $sport->id) }}" method="post"> @csrf
        <div style="display: inline-block">
            Nombre <input type="text" name="nombre" value='{{ $sport->nombre }}'><br>
            URL <input type="text" name="URL" value='{{ $sport->URL }}'><br>
        </div>
        <div style="display: inline-block">
            <input type="submit" value="Guardar">
        </div>
    </form>
</body>
</html>