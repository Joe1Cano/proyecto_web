<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/formularios.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!--css link Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!--css link Bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="icon" href="{{ asset('logos/LogoSinNombre.png') }}" type="image/x-icon">

    <title>Agregar canción</title>
</head>

<body>
    <div class="contenedor">

        <div id="navbar" class="sidenav" style="height: 100%;">
            <img class="img-fluid" id="logo" src="{{ asset('logos/LogoSinNombre.png') }}" alt="" id="logo" onclick="location.href='./songs'">
            <a href="./favorites"><span class="bi bi-heart-fill"></span> Favoritas</a>
            <a href="./listas"><span class="bi bi-music-note-list"></span> Playlists</a>
            <a href="#"><span class="bi bi-person-lines-fill"> Perfil</a>
            <a href="#"><span class="bi bi-sliders2-vertical"></span> Configuracion</a>
            <a href="./subirSongs"><span class="bi bi-plus-circle"></span> Subir canción</a>
        </div>

        <div class="form">
            <div class="icon">
                <i class="bi bi-plus" style="font-size: 100px"></i>
                <i class="bi bi-file-earmark-music" style="font-size: 100px"></i>
            </div>
            <form action="{{route('subirSong')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <label for="">Canción:</label>
                <input type="text" name="name" required>
                <br>
                <label for="">Artista:</label>
                <input type="text" name="autor" required>
                <br>
                <label for="">Imagen</label>
                <div class="upload">
                    <label for="img-input">
                        <i class="bi bi-image"></i>
                    </label>
                    <input type="file" id="img-input" name="img" required style="display: none;">
                </div>
                <br>
                <label for="">Audio</label>
                <div class="upload">
                    <label for="sound-input">
                        <i class="bi bi-headphones"></i>
                    </label>
                    <input type="file" id="sound-input" name="song" required style="display: none;">
                </div>
                <br>
                <div class="formbtn">
                    <button class="btnform" id="confirm" type="submit" value="" >
                        <i class="bi bi-check-circle"></i>
                    </button>
                    <a class="btnform" id="cancel" href="{{route('songs.index')}}">
                        <i class="bi bi-x-circle"></i>
                    </a>
                </div>
                
            </form>
            
        </div>


    </div>
</body>
</html>


