<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Ususario</title>
</head>
<body>
    <h1>Crear Usuarios</h1>
    <form action="{{route('validar-registro')}}" method="post">
        @csrf
        <label for="name">Nombre(s):</label>
        <input type="text" name="name" required><br>
        <label for="l_name">Apellido(s):</label>
        <input type="text" name="l_name" required><br>
        <label for="mail">Correo:</label>
        <input type="email" name="mail" required><br>
        <label for="password">Contraseña:</label>
        <input type="text" name="password" required><br>
        <button type="submit">Registrar</button>
    </form>
</body>
</html>