<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('referee.ReceiveDataAndCreateReferee') }}" method="post"> @csrf
        <div style="display: inline-block">
            Nombre <input type="text" name="nombre"><br>
            Apellido <input type="text" name="apellido"><br>
        </div>
        <div style="display: inline-block">
            <input type="submit" value="Guardar">
        </div>
    </form>
    <table>
        <tbody>
            <tr>
                <th>refree</th>
            </tr>
            @foreach ($referees as $referee)
                <tr>
                    <td>{{ $referee->nombre }}</td>
                    <td>{{ $referee->apellido }}
                        <form action="{{ route('referee.DeleteReferee', $referee->id) }}" method="get" style="display: inline-block"> @csrf
                            <button type="submit">Borrar</button>
                        </form>
                        <form action="{{ route('referee.RedirectPageToEditReferee', $referee->id) }}" style="display: inline-block"> @csrf
                            <button type="submit">Actualizar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>