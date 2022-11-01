<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('publicitie.ReceiveDataAndCreatePublicitie') }}" method="post"> @csrf
        <div style="display: inline-block">
            URL <input type="text" name="URL"><br>
        </div>
        <select name='Sports'>
            @foreach ($sports as $sport)
                    <option value="{{ $sport->id }}">{{ $sport->nombre }}</option>
            @endforeach
        </select>
        <div style="display: inline-block">
            <input type="submit" value="Guardar">
        </div>
    </form>
    <table>
        <tbody>
            <tr>
                <th>URL</th>
            </tr>
            @foreach ($publicities as $publicitie)
                <tr>
                    <td>
                        <div style="display: inline-block">
                            <p>{{ $publicitie->URL }}</p><br>
                        </div> 
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