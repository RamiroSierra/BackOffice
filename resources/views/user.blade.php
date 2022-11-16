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
                            <form action="{{ route('user.DeleteStandardUser', $standard->id ) }}" method="get" style="display: inline-block"> @csrf
                                <button type="submit">Borrar</button>
                            </form>
                        </td>
                        <td>
                            <form action="{{ route('user.RedirectPageToEditUser', $standard->id ) }}" method="get" style="display: inline-block"> @csrf
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
                        <td>{{ $vip->userE }}</td>
                        <td>
                            <form action="{{ route('user.DeleteVipUser', $vip->id ) }}" method="get" style="display: inline-block"> @csrf
                                <button type="submit">Borrar</button>
                            </form>
                        </td>
                        <td>
                            <form action="{{ route('user.RedirectPageToEditUser', $vip->id ) }}" method="get" style="display: inline-block"> @csrf
                                <button type="submit">Actualizar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div style="position:absolute; right: 5px;top: 0px;">
            <ul style="list-style: none;">
                <li><a href="{{ route('player.SendDataPlayer')}}"><button>Crear jugador</button> </a></li>
                <li><a href="{{ route('referee.SendDataReferee') }}"><button>Crear Arbitro</button> </a></li>
                <li><a href="{{ route('technical.SendDataTechnical') }}"><button>Crear DT</button> </a></li>
                <li><a href="{{ route('sport.SendDataSport') }}"><button>Crear Deporte</button> </a></li>
                <li><a href="{{ route('user.SendDataUser') }}"><button>Crear Cliente</button> </a></li>
                <li><a href="{{ route('publicitie.SendDataPublicitie') }}"><button>Crear Publicidad</button> </a></li>
                <li><a href="{{ route('team.SendDataTeam') }}"><button>Crear Equipo</button> </a></li>
                <li><a href="{{ route('forPoint.SendDataForPoint') }}"><button>Crear Evento por Puntos</button> </a></li>
                <li><a href="{{ route('league.SendDataLeague') }}"><button>Crear liga</button> </a></li>
                <li><a href="{{ route('record.SendDataRecord') }}"><button>Crear Evento por marca</button> </a></li>
                <li><a href="{{ route('forSet.SendDataForSet') }}"><button>Crear Evento por sets</button> </a></li>
            </ul>
        </div>
</body>
</html>