<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/CreateStandard" method="post"> @csrf
        nombre <input type="text" name="nombre" id="">  <br>
        apellido <input type="text" name="apellido" id="">  <br>
        alias <input type="text" name="alias" id="">  <br>
        email <input type="text" name="email" id="">  <br>
        Password <input type="text" name="password" id=""> <br>
        <input type="submit" value="Registrar">
    </form>
    <form action="/lista" method="get">
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
                        <td>{{ $sql->userE }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </form>
</body>
</html>