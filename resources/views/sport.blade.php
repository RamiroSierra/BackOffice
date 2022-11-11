<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('sport.ReceiveDataAndCreateSport') }}" method="post"> @csrf
        nombre <input type="text" name="nombre"><br>
        URL <input type="text" name="URL"><br>
        
        <select name='typeOfResult'>
            <option value="1">Por Set</option>
            <option value="2">Por Tantos</option>
            <option value="3">Por Marca</option>
        </select>
        <input type="submit" value="Registrar">
    </form>
    <table>
        <tbody>
            <tr>
                <th>Nombre</th>
                <th>Tipo de deporte</th>
            </tr>
            @foreach ($sports as $sport)
                <tr>
                    <td>{{ $sport->nombre }}</td>
                    <td>{{ $sport->tipo_resultado }}</td>
                    <td>
                         <form action="{{ route('sport.RedirectPageToEditSport', $sport->id) }}" style="display: inline-block"> @csrf
                            <button type="submit">Actualizar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>