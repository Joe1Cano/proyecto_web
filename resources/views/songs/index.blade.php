<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Canciones</title>
    <style>
        img{
            height: 200px;
            width: 200px;
        }
    </style>
</head>
<body>
    <h1>Canciones</h1>
    <a href="{{route('subirSongs')}}"><button>Subir Canción</button></a>
    <table style="width:100%" border="1">
        <tr style="background-color: #CCC;"><th>Album</th><th>Cancion</th><th>Autor</th></tr>
        @foreach ($songs as $song)
        <tr onclick=<?php echo "showData('".$song->id."')"?> >
            <td><img src=" <?php echo "http://localhost:8080/paw233/proyect_web/storage/app/public/".$song->foto ?>" ></td>
            <td>{{$song->nombre}}</td>
            <td>{{$song->autor}}</td>
        </tr>
        @endforeach
    </table>
</body>
<footer>
    <input type="hidden" id="id">
    <h3 id="cancion"></h3>
    <h5 id="autor"></h5>
    <button onclick="playSound()">Play</button>
    <button onclick="pauseSound()">Pause</button>
    <label for="volume">Volume:</label>
    <input type="range" id="volume" min="0" max="1" step="0.01" value="0.5" oninput="setVolume()">
        <audio id="reprod" src="" type="audio/mpeg"></audio>
    <div>
    <button onclick="nextSong()">Next</button>
    <button onclick="beforeSong()">Before</button>
    <span id="current-time">0:00</span>
    <input type="range" id="seek-bar" min="0" max="100" value="0" step="0.1">
    <span id="duration">0:00</span>
    </div>
</footer>
</html>
<script>
var songs = "{{$songs}}";
var decodedArrayAsString = songs.replace(/&quot;/g, '"');
var array = JSON.parse(decodedArrayAsString);
var idArray = array.map(obj => obj.id);
console.log(idArray)
var volumeControl = document.getElementById("volume");
function showData(id_s) {
    var songs = "{{$songs}}";
    const decodedArrayAsString = songs.replace(/&quot;/g, '"');
    const array = JSON.parse(decodedArrayAsString);
    const idToFind = parseInt(id_s);
    const subarray = array.find(obj => obj.id === idToFind);
    song = subarray.archivo_au;
    file = document.getElementById("reprod");
    file.src = "http://localhost:8080/paw233/proyect_web/storage/app/public/"+song;
    song = document.getElementById("cancion");
    song.innerText = subarray.nombre;
    autor = document.getElementById("autor");
    autor.innerText = subarray.autor;
    id = document.getElementById("id");
    id.value = subarray.id;
}
function playSound() {
    var audio = document.getElementById("reprod");
    changeAudioSrc(audio.src)
    audio.play();
}
function pauseSound() {
    var audio = document.getElementById("reprod");
    audio.pause();
}
function setVolume() {
    var audio = document.getElementById("reprod");
    audio.volume = volumeControl.value;
}
function nextSong(){
    var id_play = document.getElementById("id");
    id_look = id_play.value;
    var position = idArray.indexOf(parseInt(id_look));
    position = (position + 1) % array.length;
    showData(idArray[position]);
    playSound()
}
function beforeSong(){
    var id_play = document.getElementById("id");
    id_look = id_play.value;
    var position = idArray.indexOf(parseInt(id_look));
    position = (position - 1 + array.length) % array.length;
    showData(idArray[position]);
    playSound()
}

let audioSrc = "";

const audioPlayer = document.getElementById("reprod");
const seekBar = document.getElementById("seek-bar");
const currentTime = document.getElementById("current-time");
const duration = document.getElementById("duration");

function loadAudio() {
  audioPlayer.src = audioSrc;
  audioPlayer.load();
  duration.textContent = formatTime(audioPlayer.duration);
}

audioPlayer.addEventListener("timeupdate", function() {
  seekBar.value = (audioPlayer.currentTime / audioPlayer.duration) * 100;
  currentTime.textContent = formatTime(audioPlayer.currentTime);
});

audioPlayer.addEventListener("loadedmetadata", function() {
  duration.textContent = formatTime(audioPlayer.duration);
});

function formatTime(time) {
  const minutes = Math.floor(time / 60);
  const seconds = Math.floor(time % 60);
  return `${minutes}:${seconds.toString().padStart(2, "0")}`;
}

function changeAudioSrc(newSrc) {
  audioSrc = newSrc;
  loadAudio();
}

</script>