<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('publicitie.UpdatePublicitie',$publicitie)}}" method="post"> @csrf
        <div style="display: inline-block">
            URL <input type="text" name="URL" value='{{$publicitie->URL}}'><br>
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
    </table>
</body>
</html>