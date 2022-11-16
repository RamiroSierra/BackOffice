<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('record.UpdateRecord',$record->id) }}" method="post"> @csrf
        unidad de medida <input type="text" name="unidad_de_medida" value='{{$record->unidad_de_medida}}'><br>
        puntos <input type="number" name="puntaje" value='{{$record->puntaje}}'><br>
        <div style="display: inline-block">
            <input type="submit" value="Guardar">
        </div>
    </form>
</body>
</html>