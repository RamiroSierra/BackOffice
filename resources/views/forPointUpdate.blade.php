<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   
    <form action="{{ route('forPoint.UpdateForPoint',$forPoint->id) }}" method="post"> @csrf
        puntos del visita <input type="number" name="puntos_visita" value='{{ $forPoint->puntos_visita }}'><br>
        puntos del local <input type="number" name="puntos_local" value='{{ $forPoint->puntos_local }}'><br>
        Fecha <input type="datetime-local" name="fecha"value='{{ $forPoint->fecha }}'><br>
        
        Referees
        @foreach ($referees as $referee)
        <tr>
            <td>
                <input type="checkbox" value="{{ $referee->id }}" id="{{ $referee->id }}" name="seleccionarReferees[]">
                {{ $referee->nombre }} {{ $referee->apellido }}
            </td>
        </tr>
        @endforeach
        <div style="display: block">
            
            Leagues
            <select name='League'>
                @foreach ($leagues as $league)
                        <option value="{{ $league->id }}">{{ $league->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div style="display: block">
            
            Team Local
            <select name='TeamLocal'>
                @foreach ($teams as $team)
                        <option value="{{ $team->id }}">{{ $team->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div style="display: block">
            Team Visit
            <select name='TeamVist'>
                @foreach ($teams as $team)
                        <option value="{{ $team->id }}">{{ $team->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div style="display: inline-block">
            <input type="submit" value="Guardar">
        </div>
    </form>
</body>
</html>