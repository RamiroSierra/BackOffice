<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
    <body>
        <form action="{{ route('team.ReceiveDataAndCreateTeam') }}" method="post"> @csrf
            Nombre <input type="text" name="nombre"><br>
            Nacimiento <input type="text" name="nacimiento"><br>
            Nacionalidad <input type="text" name="nacionalidad"><br>
            URL <input type="text" name="URL"><br>
            <div style="display: block">
            Tecnico
                <select name='Technicals'>
                    @foreach ($technicals as $technical)
                        <option value="{{ $technical->id }}">{{ $technical->nombre }} {{ $technical->apellido }}</option>
                    @endforeach
                </select>
            <div>
            Jugadores
            @foreach ($players as $palyer)
                <tr>
                    <td>
                        <input type="checkbox" value="{{ $palyer->id }}" id="{{ $palyer->id }}" name="seleccionarJugadores[]">
                        {{ $palyer->nombre }} {{ $palyer->apellido }}
                    </td>
                </tr>
            @endforeach
            <div style="display: block">
                <input type="submit" value="Guardar">
            </div>
        </form>
        <table>
            <tbody>
                <tr>
                    <th>Nombre</th>
                    <th>Nacimiento</th>
                    <th>nacionalidad</th>
                </tr>
                @foreach ($teams as $team)
                    <tr>
                        <td>{{ $team->nombre }}</td>
                        <td>{{ $team->nacimiento }}</td>
                        <td>{{ $team->nacionalidad }}</td>
                        <td>
                            <form action="{{ route('team.DeleteTeam', $team->id) }}" method="get" style="display: inline-block"> @csrf
                                <button type="submit">Borrar</button>
                            </form>
                        </td>
                        <td>
                            <form action="{{ route('team.RedirectPageToEditTeam', $team->id) }}" method="get" style="display: inline-block"> @csrf
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