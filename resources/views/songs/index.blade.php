<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tabla.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!--css link Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!--css link Bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <title>Audiophile</title>
    <link rel="icon" href="{{ asset('logos/LogoSinNombre.png') }}" type="image/x-icon">
</head>
<body>
    <div id="contenedor">
    <div id="navbar" class="sidenav">
        <img class="img-fluid" id="logo" src="{{ asset('logos/LogoSinNombre.png') }}" alt="" id="logo">
        <a href="./favorites"><span class="bi bi-heart-fill"></span> Favoritas</a>
        <a href="./listas"><span class="bi bi-music-note-list"></span> Playlists</a>
        <a href="#"><span class="bi bi-person-lines-fill"> Perfil</a>
        <a href="#"><span class="bi bi-sliders2-vertical"></span> Configuracion</a>
        <a href="./subirSongs"><span class="bi bi-plus-circle"></span> Subir canción</a>

        <div class="sidenav-label">
            <p id="cancion"></p>
            <p id="autor"></p>
        </div>
    </div>

    <div class="tabla">
        <h1>Audiophile</h1>
        <table style="width:100%">
            <tr id="header"><th id="covertbl">Album</th><th>Cancion</th><th>Autor</th><th></th></tr>
            @foreach ($songs as $song)
            <tr id="trtbl" onclick=<?php echo "showData('".$song->id."')"?> >
                <form action="./subirFav" method="get">
                <input type="hidden" name="file" id="file" value="{{$song->archivo_au}}">
                <td id='covertbl'><input type="hidden" name="img" id="img" value="{{$song->foto}}"><img id="imgtbl" src=" <?php echo "http://localhost:80/proyecto_web/storage/app/public/".$song->foto ?>" ></td>
                <!--<td><input type="hidden" name="img" id="img" value="{{$song->foto}}"><img id="imgtbl" src=" <?php echo "http://localhost:8080/paw233/proyect_web/storage/app/public/".$song->foto ?>" ></td> -->
                <td><input type="hidden" name="name" id="name" value="{{$song->nombre}}"><label id="nametbl">{{$song->nombre}}</label></td>
                <td><input type="hidden" name="autor" id="autor" value="{{$song->autor}}">{{$song->autor}}</td>
                <td><button type="submit" id="liketbl"><span id="liketbl" class="bi bi-heart-fill"></button></td>
                </form>
                <form class="my-form" id="form{{$song->id}}" action="./subirprueba4" method="get">
                <input type="hidden" name="img" id="img" value="{{$song->foto}}">
                <input type="hidden" name="file" id="file" value="{{$song->archivo_au}}">
                <input type="hidden" name="name" id="name" value="{{$song->nombre}}">
                <input type="hidden" name="autor" id="autor" value="{{$song->autor}}">
                <td> 
                <select class="mySelect" name="mySelect" id="{{$song->id}}">
                    <option disabled selected>Selecciona una lista</option>
                    @foreach ($listas as $lista)
                    <option value="{{$lista->name}}">{{$lista->name}}</option>
                    @endforeach
                </select>
                <button type="submit">Guardar</button>
                </form>
                </td>
                </tr>
                @endforeach
        </table>
    </div>
    </div>
</body>


<footer>
    <input type="hidden" id="id">

    <div class="cover">
        <img id="cover" src="http://localhost:80/proyecto_web/storage/app/public/Black.jpg" alt="">
        <!--<img id="cover" src="http://localhost:8080/paw233/proyect_web/storage/app/public/Black.jpg" alt="">--> 
    </div>

    <div class="footer-content">
        <form action="./subirFavf" method="get">
            <input type="hidden" name="file_f" id="file_f" value="" required>
            <!--<input type="hidden" name="img_f" id="img_f" value="{{$song->foto}}">-->
            <input type="hidden" name="img_f" id="img_f" value="" required>
            <input type="hidden" name="name_f" id="name_f" value=""required>
            <input type="hidden" name="autor_f" id="autor_f" value=""required>
            <button type="submit" id="like"><i class="bi bi-heart"></i></button>
        </form>
        <label>
            <input type="checkbox" id="repeat">
            <span class="bi bi-repeat" id="rep"></span>
        </label>
        <button id="sigant" onclick="beforeSong()"><i class="bi bi-rewind-fill"></i></button>
        <button id="play" onclick="playSound()"><i id="play" class="bi bi-play-circle-fill"></i></button>
        <button id="pause" onclick="pauseSound()" style="display: none"><i id="pause" class="bi bi-pause-circle-fill"></i></button>
        <button id="sigant" onclick="nextSong()"><i class="bi bi-fast-forward-fill"></i></button>
        <label>
            <input type="checkbox" id="shuffle">
            <span class="bi bi-shuffle" id="shuf"></span>
        </label>
        <span class="bi bi-volume-down-fill" id="vol"></span>
        <input type="range" min="0" max="1" value=".5" step="0.01" class="slider" id="volumen" oninput="setVolume()">
    </div>

    <div class="slidercontainer">
        <div><span id="current-time">0:00</span></div>
        <input type="range" min="1" max="500" value="250" class="slider" id="duracion"></input>
        <div><span id="duration">0:00</span></div>
            
            <audio id="reprod" src="" type="audio/mpeg"`style="display: none;"></audio>
            
        </div>
</footer>

</html>
<!--<script src="{{ asset('js/reproductor.js') }}"> </script>-->
<script> 
let isShuffle = false;
let isLoop = false;
const audio = document.getElementById("reprod");
const loopCheckbox = document.getElementById("repeat");
const shuffleCheckbox = document.getElementById("shuffle");

loopCheckbox.addEventListener("change", () => {
    isLoop = loopCheckbox.checked;
    icon = document.getElementById("rep");
    if(isLoop == true){
        icon.style.color = "#fa79c0";
        audio.loop = loopCheckbox.checked;
    } else {
        icon.style.color = "#f2cee2";
        audio.loop = loopCheckbox.checked;
    }
    
});
shuffleCheckbox.addEventListener("change", () => {
    isShuffle = shuffleCheckbox.checked;
    icon = document.getElementById("shuf");
    if(isShuffle == true){
        icon.style.color = "#fa79c0";
    } else {
        icon.style.color = "#f2cee2";
    }
});
var songs = "{{$songs}}";
var decodedArrayAsString = songs.replace(/&quot;/g, '"');
var array = JSON.parse(decodedArrayAsString);
var idArray = array.map(obj => obj.id);
var volumeControl = document.getElementById("volumen");

function showData(id_s) {
    var songs = "{{$songs}}";
    const decodedArrayAsString = songs.replace(/&quot;/g, '"');
    const array = JSON.parse(decodedArrayAsString);
    const idToFind = parseInt(id_s);
    const subarray = array.find(obj => obj.id === idToFind);
    song = subarray.archivo_au;
    file = document.getElementById("reprod");
    //file.src = "http://localhost:8080/paw233/proyect_web/storage/app/public/" + song;
    file.src = "http://localhost:80/proyecto_web/storage/app/public/" + song;
    song = document.getElementById("cancion");
    song.innerText = subarray.nombre;
    autor = document.getElementById("autor");
    autor.innerText = subarray.autor;
    img = document.getElementById("cover");
    //img.src = "http://localhost:8080/paw233/proyect_web/storage/app/public/" + subarray.foto;
    img.src = "http://localhost:80/proyecto_web/storage/app/public/" + subarray.foto;
    id = document.getElementById("id");
    id.value = subarray.id;
    file_f = document.getElementById("file_f");
    file_f.value = subarray.archivo_au;
    img_f = document.getElementById("img_f");
    img_f.value = subarray.foto;
    name_f = document.getElementById("name_f");
    name_f.value = subarray.nombre;
    autor_f = document.getElementById("autor_f");
    autor_f.value = subarray.autor;
    playSound();
}

audio.addEventListener("ended", () => {
    if (isShuffle) {
        var id_play = document.getElementById("id");
        id_look = id_play.value;
        var position = idArray.indexOf(parseInt(id_look));
        position = Math.floor(Math.random() * array.length);
        showData(idArray[position]);
    } else {
        nextSong();
    }
});

function playSound() {
    play = document.getElementById("play").style.display = "none";
    pause = document.getElementById("pause").style.display = "block";
    var audio = document.getElementById("reprod");
    audio.play();
}
function pauseSound() {
    pause = document.getElementById("pause").style.display = "none";
    play = document.getElementById("play").style.display = "block";
    var audio = document.getElementById("reprod");
    audio.pause();
}
function setVolume() {
    var audio = document.getElementById("reprod");
    audio.volume = volumeControl.value;
}
function nextSong() {
    var id_play = document.getElementById("id");
    id_look = id_play.value;
    var position = idArray.indexOf(parseInt(id_look));
    if (isShuffle) {
        position = Math.floor(Math.random() * array.length);
    } else {
        position = (position + 1) % array.length;
    }
    showData(idArray[position]);
}
function beforeSong() {
    var id_play = document.getElementById("id");
    id_look = id_play.value;
    var position = idArray.indexOf(parseInt(id_look));
    if (isShuffle) {
        position = Math.floor(Math.random() * array.length);
    } else {
        position = (position - 1 + array.length) % array.length;
    }
    showData(idArray[position]);
}

let audioSrc = "";

const audioPlayer = document.getElementById("reprod");
const seekBar = document.getElementById("duracion");
const currentTime = document.getElementById("current-time");
const duration = document.getElementById("duration");

function loadAudio() {
    audioPlayer.src = audioSrc;
    audioPlayer.load();
    duration.textContent = formatTime(audioPlayer.duration);
}

seekBar.addEventListener("input", function () {
    audioPlayer.currentTime = (seekBar.value / 100) * audioPlayer.duration;
});

audioPlayer.addEventListener("timeupdate", function () {
    seekBar.value = (audioPlayer.currentTime / audioPlayer.duration) * 100;
    currentTime.textContent = formatTime(audioPlayer.currentTime);
});

audioPlayer.addEventListener("loadedmetadata", function () {
    duration.textContent = formatTime(audioPlayer.duration);
});

function formatTime(time) {
    const minutes = Math.floor(time / 60);
    const seconds = Math.floor(time % 60);
    return `${minutes}:${seconds.toString().padStart(2, "0")}`;
}

function changeAudioSrc(newSrc) {
    audioPlayer.src = audioSrc;
    if (audioSrc != newSrc) {
        audioSrc = newSrc;
        loadAudio();
    }
}

$(document).ready(function() {
    $('select.mySelect').change(function() {
        var selectedValue = $(this).val();
        var selectedID = $(this).attr('id');
        console.log(selectedID + ' = ' + selectedValue);
        // Do something with the selected value and ID.
        form = document.getElementById("form"+selectedID);
        new_word="subir"+selectedValue;
        prueba= replaceLastWord(form.action,new_word);
        form.action = prueba;
    });
});

function replaceLastWord(url, newWord) {
    const parts = url.split('/');
    parts[parts.length - 1] = newWord;
    return parts.join('/');
}
</script>