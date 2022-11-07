<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   
    <form action="{{ route('card.ReceiveDataAndCreateCard',$vip)}}" method="post"> @csrf
        nombre_titular <input type="text" name="nombre_titular"><br>
        ci_titular <input type="number" name="ci_titular"><br>
        fecha_ven<input type="date" name="fecha_ven"><br>
        codigo<input type="number" name="codigo"><br>
        numero<input type="number" name="numero"><br>
        <div style="display: inline-block">
            <input type="submit" value="Guardar">
        </div>
    </form>
    <table>
        <tbody>
            <tr>
                <th>nombre del Titular</th>
            </tr>
            @foreach ($cards as $card)
                <tr>
                    <td>{{ $card->nombre_titular }}</td>
                        {{-- <form action="{{ route('card.delete', $card->id) }}" method="get" style="display: inline-block"> @csrf
                            <button type="submit">Borrar</button>
                        </form>
                        <form action="{{ route('card.edit', $card->id) }}" style="display: inline-block"> @csrf
                            <button type="submit">Actualizar</button>
                        </form> --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>