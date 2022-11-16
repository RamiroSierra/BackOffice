<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   
    <form action="{{ route('forSet.UpdateForSet',$forSets->id) }}" method="post"> @csrf
        ganadas del visita <input type="number" name="ganadas_visita" value='{{$forSets->ganadas_visita}}'><br>
        ganadas del local <input type="number" name="ganadas_local"value='{{$forSets->ganadas_local}}'><br>
        Fecha <input type="datetime-local" name="fecha"value='{{$forSets->fecha}}'><br>
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
    <form action="{{ route('set.SendDataSet', $forSets->id) }}" method="get" style="display: inline-block"> @csrf
        <button type="submit">Agregar set</button>
    </form>
    <table>
        <tbody>
            <tr>
                <th>puntos del visita</th>
                <th>puntos del local</th>
            </tr>
            @foreach ($sets as $set)
                <tr>
                    <td>{{ $set->puntos_visita }}</td>
                    <td>{{ $set->puntos_local }}</td>
                    <td>
                        <form action="{{ route('set.DeleteSet', $set->id) }}" method="get" style="display: inline-block"> @csrf
                            <button type="submit">Borrar</button>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('set.RedirectPageToEditSet', $set->id) }}" method="get" style="display: inline-block"> @csrf
                            <button type="submit">Actualizar</button>
                        </form>
                    </td> 
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>