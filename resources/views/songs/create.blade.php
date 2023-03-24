<form action="{{route('subirList')}}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
    <label for="">Nombre:</label>
    <input type="text" name="name" require><br>
    <label for="">Imagen:</label>
    <input type="file" name="img" require><br>
    <input type="submit" value="Subir">
</form>
<a href="{{route('listas.index')}}">Salir</a>