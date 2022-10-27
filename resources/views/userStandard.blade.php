<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('Standard.keep')}}" method="post"> @csrf
        nombre <input type="text" name="nombre"><br>
        apellido <input type="text" name="apellido"><br>
        alias <input type="text" name="name"><br>
        email <input type="text" name="email"><br>
        Password <input type="text" name="password"><br>
        <input type="submit" value="Registrar">
    </form>
    <table>
        <tbody>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Alais</th>
                <th>Email</th>
            </tr>
            @foreach ($sqls as $sql)
                <tr>
                    <td>{{ $sql->clientN }}</td>
                    <td>{{ $sql->clientA }}</td>
                    <td>{{ $sql->userN }}</td>
                    <td>{{ $sql->userE }}
                        <form action="{{ route('Standard.delete', $sql->id) }}" method="get" style="display: inline-block"> @csrf
                        <button type="submit">Borrar</button>
                        </form>
                    </td>
                    {{--<form action="{{ route('Standard.edit', $sql->id) }}" style="display: inline-block"> @csrf
                        <button type="submit">Actualizar</button>
                    </form>--}}
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>