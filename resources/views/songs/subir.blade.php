<form action="{{route('subirSong')}}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
    <label for="">Nombre:</label>
    <input type="text" name="name" require><br>
    <label for="">Autor:</label>
    <input type="text" name="autor" require><br>
    <label for="">Imagen:</label>
    <input type="file" name="img" require><br>
    <label for="">Canción:</label>
    <input type="file" name="song" require><br>
    <input type="submit" value="Subir">
</form>