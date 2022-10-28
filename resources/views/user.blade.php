<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('user.receiveAndCreate')}}" method="post"> @csrf
        nombre <input type="text" name="nombre"><br>
        apellido <input type="text" name="apellido"><br>
        alias <input type="text" name="name"><br>
        email <input type="text" name="email"><br>
        Password <input type="text" name="password"><br>
        <select name='typeOfClient'>
            <option value="1">Standard</option>
            <option value="2">Vip</option>
        </select>
        <input type="submit" value="Registrar">
    </form>
        <table style="float:left;">
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
                        <td>{{ $sql->userE }}</tr>
                @endforeach
            </tbody>
        </table>
        <table>
            <tbody>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Alais</th>
                    <th>Email</th>
                </tr>
                @foreach ($sqls2 as $sql)
                    <tr>
                        <td>{{ $sql->clientN }}</td>
                        <td>{{ $sql->clientA }}</td>
                        <td>{{ $sql->userN }}</td>
                        <td>{{ $sql->userE }}
                    </tr>
                @endforeach
            </tbody>
        </table>
</body>
</html>