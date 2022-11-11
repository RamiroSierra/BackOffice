<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('user.ReceiveDataAndCreateUser') }}" method="post"> @csrf
        nombre <input type="text" name="nombre"><br>
        apellido <input type="text" name="apellido"><br>
        alias <input type="text" name="name"><br>
        email <input type="email" name="email"><br>
        Password <input type="password" name="password"><br>
        <select name='typeOfClient'>
            <option value="1">Standard</option>
            <option value="2">Vip</option>
        </select>
        <input type="submit" value="Registrar">
    </form>
        <table style="float:left;">
            <tbody>
                <tr>
                    <th>Usuarios entendar</th>
                </tr>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Alais</th>
                    <th>Email</th>
                </tr>
                @foreach ($standards as $standard)
                    <tr>
                        <td>{{ $standard->clientN }}</td>
                        <td>{{ $standard->clientA }}</td>
                        <td>{{ $standard->userN }}</td>
                        <td>{{ $standard->userE }}</td>
                        <td>
                            <form action="{{ route('standard.RedirectPageToEditStandard', $standard->id ) }}" method="get" style="display: inline-block"> @csrf
                                <button type="submit">Actualizar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <table>
            <tbody>
                <tr>
                    <th>Usuarios entendar</th>
                </tr>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Alais</th>
                    <th>Email</th>
                </tr>
                @foreach ($vips as $vip)
                    <tr>
                        <td>{{ $vip->clientN }}</td>
                        <td>{{ $vip->clientA }}</td>
                        <td>{{ $vip->userN }}</td>
                        <td>{{ $vip->userE }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
</body>
</html>