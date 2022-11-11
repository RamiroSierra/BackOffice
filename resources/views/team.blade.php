<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('team.ReceiveDataAndCreateTeam') }}" method="post"> @csrf
            Nombre <input type="text" name="nombre"><br>
            Nacimiento <input type="text" name="nacimiento"><br>
            Nacionalidad <input type="text" name="nacionalidad"><br>
            URL <input type="text" name="URL"><br>
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
    <table>
        <tbody>
            <tr>
                <th>Nombre</th>
                <th>Nacimiento</th>
                <th>Nacionalidad</th>
            </tr>
            @foreach ($teams as $team)
                <tr>
                    <td>{{ $team->nombre }}</td>
                    <td>{{ $team->nacimiento }}</td>
                    <td>{{ $team->nacionalidad }}</td>
                    <td>{{ $team->tipo_resultado }}</td>
                    <td>
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