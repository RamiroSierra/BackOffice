<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('league.UpdateLeague',$league) }}" method="post"> @csrf
            Nombre <input type="text" name="nombre" value='{{$league->nombre}}'><br>
            URL <input type="text" name="URL"value='{{$league->URL}}'><br>
            <div style="display: block">
            Deporte
            <select name='Sports'>
                @foreach ($sports as $sport)
                        <option value="{{ $sport->id }}">{{ $sport->nombre }}</option>
                @endforeach
            </select>
            </div>
            <div style="display: block">
            Equipos
            @foreach ($teams as $team)
                <tr>
                    <td>
                        <input type="checkbox" value="{{ $team->id }}" id="{{ $team->id }}" name="seleccionarEquipo[]">
                        {{ $team->nombre }}
                    </td>
                </tr>
            @endforeach
            </div>
            <div style="display: block">
                <input type="submit" value="Guardar">
            </div>
    </form>
</body>
</html>