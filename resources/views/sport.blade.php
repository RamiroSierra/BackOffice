<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('sport.keep')}}" method="post"> @csrf
        nombre <input type="text" name="nombre"><br>
        URL <input type="text" name="URL"><br>
        <select name='result_id'>
            @foreach ($results as $result)
                <option value="{{ $result->id }}">{{ $result->tipo_resultado }}</option>
            @endforeach
        </select>
        <input type="submit" value="Registrar">
    </form>
    <table>
        <tbody>
            <tr>
                <th>Nombre</th>
                <th>URL</th>
            </tr>
            @foreach ($sports as $sport)
                <tr>
                    <td>{{ $sport->nombre }}</td>
                    <td>{{ $sport->URL}}
                       {{-- <form action="{{ route('sport.delete', $sport->id) }}" method="get" style="display: inline-block"> @csrf
                            <button type="submit">Borrar</button>
                        </form>
                         <form action="{{ route('sport.edit', $sport->id) }}" style="display: inline-block"> @csrf
                            <button type="submit">Actualizar</button>
                        </form> --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>