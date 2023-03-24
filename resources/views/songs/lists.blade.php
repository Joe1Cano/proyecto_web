<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Favoritas</title>
    <style>
        img{
            height: 200px;
            width: 200px;
        }
    </style>
</head>
<body>
    <h1>Listas de reproducción</h1>
    <a href="./songs"><button>Canciones</button></a>
    <a href="{{route('createList')}}"><button>Crear Lista</button></a>
    <table style="width:100%" border="1">
        <tr style="background-color: #CCC;"><th>Imagen</th><th>Nombre</th><th>Acciones</th></tr>
        @foreach ($songs as $song)
        <tr onclick=<?php echo "showData('".$song->id."')"?> >
            <td><img src=" <?php echo "http://localhost:8080/paw233/proyect_web/storage/app/public/".$song->foto ?>" ></td>
            <td>{{$song->nombre}}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>