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
            <div style="display: block">
            Deporte
            <select name='Sports'>
                @foreach ($sports as $sport)
                        <option value="{{ $sport->id }}">{{ $sport->nombre }}</option>
                @endforeach
            </select>
            </div>
            <div style="display: block">
            Equipos
            @foreach ($teams as $team)
                <tr>
                    <td>
                        <input type="checkbox" value="{{ $team->id }}" id="{{ $team->id }}" name="seleccionarEquipo[]">
                        {{ $team->nombre }}
                    </td>
                </tr>
            @endforeach
            </div>
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
                    <td>{{ $league->nombre }}</td>
                    <td>
                        <form action="{{ route('league.DeleteLeague', $league->id ) }}" method="get" style="display: inline-block"> @csrf
                            <button type="submit">Borrar</button>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('league.RedirectPageToEditLeague', $league->id ) }}" method="get" style="display: inline-block"> @csrf
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