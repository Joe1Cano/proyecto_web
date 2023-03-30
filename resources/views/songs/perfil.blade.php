<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        img{
            width: 100px;
            height: 100px;
        }
    </style>
</head>
<body>
    <img src="http://localhost:8080/paw233/proyect_web/storage/app/public/@auth{{Auth::user()->img}}@endauth" alt=""> <h1>Perfil de: @auth {{Auth::user()->name}} {{Auth::user()->l_name}}@endauth</h1>
    <form action="{{route('perfil.update',Auth::user()->id)}}" method="post">
    @csrf
    @method('PUT')
        <input type="text" name="id" value="@auth{{Auth::user()->id}}@endauth">
        <label for="">Nombre(s):</label>
        <input type="text" name="name" required value="@auth{{Auth::user()->name}}@endauth"><br>
        <label for="">Apellido(s):</label>
        <input type="text" name="l_name" required value="@auth{{Auth::user()->l_name}}@endauth"><br>
        <label for="">Correo:</label>
        <input type="email" name="mail" required value="@auth{{Auth::user()->email}}@endauth"><br>
        <label for="">Contraseña:</label>
        <input type="text" name="password"><br>
        <label for="">Imagen:</label>
        <input type="file" name="img" id="img" required><br>
        <button type="submit">Editar</button>
    </form>
</body>
</html>