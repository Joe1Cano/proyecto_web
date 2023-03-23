let isShuffle = false;
const audio = document.getElementById("reprod");
const loopCheckbox = document.getElementById("repeat");
const shuffleCheckbox = document.getElementById("shuffle");
loopCheckbox.addEventListener("change", () => {
    audio.loop = loopCheckbox.checked;
});
shuffleCheckbox.addEventListener("change", () => {
    isShuffle = shuffleCheckbox.checked;
});
var songs = "{{$songs}}";
var decodedArrayAsString = songs.replace(/&quot;/g, '"');
var array = JSON.parse(decodedArrayAsString);
var idArray = array.map(obj => obj.id);
var volumeControl = document.getElementById("volumen");

function showData(id_s) {
    var songs = "{{$songs}}";
    console.log(songs);
    const decodedArrayAsString = songs.replace(/&quot;/g, '"');
    const array = JSON.parse(decodedArrayAsString);
    const idToFind = parseInt(id_s);
    const subarray = array.find(obj => obj.id === idToFind);
    song = subarray.archivo_au;
    file = document.getElementById("reprod");
    file.src = "http://localhost:80/proyecto_web/storage/app/public/" + song;
    song = document.getElementById("cancion");
    song.innerText = subarray.nombre;
    autor = document.getElementById("autor");
    autor.innerText = subarray.autor;
    id = document.getElementById("id");
    id.value = subarray.id;
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
    var audio = document.getElementById("reprod");
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