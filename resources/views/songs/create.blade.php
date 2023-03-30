<form action="{{route('subirList')}}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
    <label for="">Nombre:</label>
    <input type="text" name="name" required><br>
    <label for="">Imagen:</label>
    <input type="file" name="img" required><br>
    <input type="submit" value="Subir">
</form>
<a href="{{route('listas.index')}}">Salir</a>