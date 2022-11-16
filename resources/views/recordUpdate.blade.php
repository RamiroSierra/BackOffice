<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   
    <form action="{{ route('record.UpdateEvent',$event->id) }}" method="post"> @csrf
        Fecha <input type="datetime-local" name="fecha" value='{{$event->fecha}}'><br>
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
    <table>
        <tbody>
            <tr>
                <th>puntos del visita</th>
                <th>puntos del local</th>
            </tr>
            @foreach ($records as $record)
                <tr>
                    <td>{{ $record->unidad_de_medida }}</td>
                    <td>{{ $record->puntaje }}</td>
                    <td>
                        <form action="{{ route('record.DeleteEvent', $record->event_id) }}" method="get" style="display: inline-block"> @csrf
                            <button type="submit">Borrar</button>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('record.RedirectPageToEditRecord', $record->id) }}" method="get" style="display: inline-block"> @csrf
                            <button type="submit">Actualizar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>