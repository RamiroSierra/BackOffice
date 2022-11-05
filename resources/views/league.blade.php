<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('league.ReceiveDataAndCreateLeague') }}" method="post"> @csrf
            Nombre <input type="text" name="nombre"><br>
            URL <input type="text" name="URL"><br>
            <select name='Sports' style="display: block">
                @foreach ($sports as $sport)
                        <option value="{{ $sport->id }}">{{ $sport->nombre }}</option>
                @endforeach
            </select>
            @foreach ($teams as $team)
                <tr>
                    <td>
                        <input type="checkbox" value="{{ $team->id }}" id="{{ $team->id }}" name="seleccionarEquipo[]">
                        {{ $team->nombre }}
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
            </tr>
            @foreach ($leagues as $league)
                <tr>
                    <td>{{ $team->nombre }}
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