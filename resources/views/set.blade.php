<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   
    <form action="{{ route('set.ReceiveDataAndCreateSet',$forSet)}}" method="post"> @csrf
        puntos Visita <input type="number" name="puntos_visita"><br>
        Puntos Local <input type="number" name="puntos_local"><br>
        <div style="display: inline-block">
            <input type="submit" value="Guardar">
        </div>
    </form>
    <table>
        <tbody>
            <td>Puntos del visita</td>
            <td>Puntos del local</td>
            @foreach ($sets as $set)
                <tr>
                    <td>{{ $set->puntos_visita }}</td>
                    <td>{{ $set->puntos_local }}</td>
                </tr>
            @endforeach
            <form action="{{ route('set.RedirectPageCreateForSet') }}" method="get" style="display: inline-block"> @csrf
                <button type="submit">Volver a Crear Evento Por Sets</button>
            </form>
        </tbody>
    </table>
</body>
</html>