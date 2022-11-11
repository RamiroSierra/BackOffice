<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   
    <form action="{{ route('forSet.ReceiveDataAndCreateForSet') }}" method="post"> @csrf
        ganadas del visita <input type="number" name="ganadas_visita"><br>
        ganadas del local <input type="number" name="ganadas_local"><br>
        Fecha <input type="datetime-local" name="fecha"><br>
        
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
                <th>ganadas del visita</th>
                <th>ganadas del local</th>
                <th>Fecha</th>
            </tr>
            @foreach ($forSets as $forSet)
                <tr>
                    <td>{{ $forSet->ganadas_visita }}</td>
                    <td>{{ $forSet->ganadas_local }}</td>
                    <td>{{ $forSet->fecha }}
                        {{-- <form action="{{ route('card.delete', $card->id) }}" method="get" style="display: inline-block"> @csrf
                            <button type="submit">Borrar</button>
                        </form>
                        <form action="{{ route('card.edit', $card->id) }}" style="display: inline-block"> @csrf
                            <button type="submit">Actualizar</button>
                        </form> --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>