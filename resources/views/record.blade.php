<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   
    <form action="{{ route('record.ReceiveDataAndCreateRecord') }}" method="post"> @csrf
        unidad de medida <input type="text" name="unidad_de_medida"><br>
        puntos del visita <input type="number" name="puntajeVisita"><br>
        puntos del local <input type="number" name="puntajeLocal"><br>
        Fecha <input type="datetime-local" name="fecha"><br>
        Referees
        @foreach ($referees as $referee)
        <tr>
            <td>
                <input type="checkbox" value="{{ $referee->id }}" id="{{ $referee->id }}" name="seleccionarReferees[]">
                {{ $referee->nombre }} {{ $referee->apellido }}
            </td>
        </tr>
        @endforeach
        <div style="display: block">
            Leagues
            <select name='League'>
                @foreach ($leagues as $league)
                        <option value="{{ $league->id }}">{{ $league->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div style="display: block">
            
            Team Local
            <select name='TeamLocal'>
                @foreach ($teams as $team)
                        <option value="{{ $team->id }}">{{ $team->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div style="display: block">
            Team Visit
            <select name='TeamVist'>
                @foreach ($teams as $team)
                        <option value="{{ $team->id }}">{{ $team->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div style="display: inline-block">
            <input type="submit" value="Guardar">
        </div>
    </form>
    <table>
        <tbody>
            <tr>
                <th>Fecha</th>
                <th>ID</th>
            </tr>
            @foreach ($events as $event)
                <tr>
                    <td>{{ $event->fecha }}</td>
                    <td>{{ $event->id }}</td>
                    <td>
                        <form action="{{ route('record.DeleteEvent', $event->id) }}" method="get" style="display: inline-block"> @csrf
                            <button type="submit">Borrar</button>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('record.RedirectPageToEditEvent', $event->id) }}" method="get" style="display: inline-block"> @csrf
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