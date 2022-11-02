<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('player.ReceiveDataAndCreatePlayer') }}" method="post"> @csrf
        <div style="display: inline-block">
            Nombre <input type="text" name="nombre"><br>
            Apellido <input type="text" name="apellido"><br>
            Edad <input type="text" name="edad"><br>
            Nacionalidad <input type="text" name="nacionalidad"><br>
        </div>
        <div style="display: inline-block">
            <input type="submit" value="Guardar">
        </div>
    </form>
    <table>
        <tbody>
            <tr>
                <th>Jugador</th>
            </tr>
            @foreach ($players as $player)
                <tr>
                    <td>{{ $player->nombre }}</td>
                    <td>{{ $player->apellido }}</td>
                    <td>{{ $player->edad }}</td>
                    <td>{{ $player->nacionalidad }}
                        <form action="{{ route('player.DeletePlayer', $player->id) }}" method="get" style="display: inline-block"> @csrf
                            <button type="submit">Borrar</button>
                        </form>
                        <form action="{{ route('player.RedirectPageToEditPlayer', $player->id) }}" style="display: inline-block"> @csrf
                            <button type="submit">Actualizar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>