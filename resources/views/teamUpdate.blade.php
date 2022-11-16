<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('team.UpdateTeam',$team) }}" method="post"> @csrf
            Nombre <input type="text" name="nombre" value='{{$team->nombre}}'><br>
            Nacimiento <input type="text" name="nacimiento" value='{{$team->nacimiento}}'><br>
            Nacionalidad <input type="text" name="nacionalidad" value='{{$team->nacionalidad}}'><br>
            URL <input type="text" name="URL" value='{{$team->URL}}'><br>
            <div style="display: block">
            Technico
                <select name='Technicals'>
                    @foreach ($technicals as $technical)
                            <option value="{{ $technical->id }}">{{ $technical->nombre }} {{ $technical->apellido }}</option>
                    @endforeach
                </select>
            <div>
            Jugadores
            @foreach ($players as $palyer)
                <tr>
                    <td>
                        <input type="checkbox" value="{{ $palyer->id }}" id="{{ $palyer->id }}" name="seleccionarJugadores[]">
                        {{ $palyer->nombre }} {{ $palyer->apellido }}
                    </td>
                </tr>
            @endforeach
        <div style="display: block">
            <input type="submit" value="Guardar">
        </div>
    </form>
</body>
</html>