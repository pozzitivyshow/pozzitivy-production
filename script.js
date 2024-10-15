let playButton = document.querySelector(".play-button");
let body = document.querySelector("body");
let videoPlayer = document.querySelector(".fullscreen-video");
let videoControls = document.querySelector(".video-controls");
let backAndSettingsPanel = document.querySelector(".back-and-settings")
let backButton = document.querySelector(".back-button");
let filmPlayer = document.querySelector(".fullscreen-video video");
let pauseInfo = document.querySelector(".pause-info");
let playbackControlsPanel = document.querySelector(".playback-controls .blurred-panel")
let pauseInfoPanel = document.querySelector(".pause-info .blurred-panel");
let pauseButtonPlayback = document.querySelector(".pause-button-playback");
let playButtonPlayback = document.querySelector(".play-button-playback")
let playPauseButton = document.querySelector(".play-pause-button");
let soundControlButtonLoud = document.querySelector(".sound-control-button-loud");
let soundControlButtonMute = document.querySelector(".sound-control-button-mute");
let fullscreenButton = document.querySelector(".fullscreen-button");
let playedLength = document.querySelector(".played-length");
let totalLength = document.querySelector(".total-length");
let episodesCloseButton = document.querySelector(".close-button");
let episodesPanel = document.querySelector(".episodes-popup");
let episodesShowButton = document.querySelector(".episodes-button");

let timerID;

function toggleEpisodesPanel(){
    if (episodesPanel.style.display == "none"){
        episodesPanel.style.display = "flex";
    }
    else{
        episodesPanel.style.display = "none";
    }
}

function showVideo(event){
    if (event.detail == 0){
        return;
    }
    dissolveControls();
    filmPlayer.play();
    body.classList.add("disable-scroll");
    videoPlayer.classList.add("active");
    pauseInfoPanel.classList.add("hidden");
    playButtonPlayback.style.display = "none";
    pauseButtonPlayback.style.display = "block";
    body.addEventListener("mousemove", showControls);
    body.addEventListener("mousemove", dissolveControls);
    event.stopPropagation();
    renderPlayedLength();
}

function hideVideo(event){
    filmPlayer.pause();
    body.classList.remove("disable-scroll");
    videoPlayer.classList.remove("active");
    pauseInfoPanel.classList.remove("hidden");
    showControls();
    event.stopPropagation();
    body.removeEventListener("mousemove", dissolveControls);
}

function soundOnOff(){
    if (filmPlayer.muted) {
        filmPlayer.muted = false;
        soundControlButtonMute.style.display = "none";
        soundControlButtonLoud.style.display = "block";
    }
    else {
        filmPlayer.muted = true;
        soundControlButtonMute.style.display = "block";
        soundControlButtonLoud.style.display = "none";
    }
}

function fullscreen(){
    if (filmPlayer.requestFullscreen) {
        filmPlayer.requestFullscreen();
    }
}

function videoPausePlay(event){
    if (event.target == videoControls || event.target == pauseButtonPlayback || event.target == playButtonPlayback){
        if (filmPlayer.paused) {
            filmPlayer.play();
            pauseInfoPanel.classList.add("hidden");
            playButtonPlayback.style.display = "none";
            pauseButtonPlayback.style.display = "block";
            dissolveControls();
            body.addEventListener("mousemove", showControls);
            body.addEventListener("mousemove", dissolveControls);
        }
        else {
            filmPlayer.pause();
            pauseInfoPanel.classList.remove("hidden");
            playButtonPlayback.style.display = "block";
            pauseButtonPlayback.style.display = "none";
            showControls();
            body.removeEventListener("mousemove", dissolveControls);
        }
        event.stopPropagation();
    }
}
function videoPausePlayKey(event){
        if (filmPlayer.paused) {
            filmPlayer.play();
            pauseInfoPanel.classList.add("hidden");
            playButtonPlayback.style.display = "none";
            pauseButtonPlayback.style.display = "block";
            dissolveControls();
            body.addEventListener("mousemove", showControls);
            body.addEventListener("mousemove", dissolveControls);
        }
        else {
            filmPlayer.pause();
            pauseInfoPanel.classList.remove("hidden");
            playButtonPlayback.style.display = "block";
            pauseButtonPlayback.style.display = "none";
            showControls();
            body.removeEventListener("mousemove", dissolveControls);
        }
}

function showControls(){
    playbackControlsPanel.classList.remove("hidden");
    backAndSettingsPanel.classList.remove("hidden");
    clearTimeout(timerID);
}

function dissolveControls() {
    clearTimeout(timerID);
    timerID = setTimeout(()=>{
        playbackControlsPanel.classList.add("hidden");
        backAndSettingsPanel.classList.add("hidden");
    }, 3000);
}

function renderPlayedLength() {
    setInterval(()=>{
        playedLength.style.width = filmPlayer.currentTime / filmPlayer.duration * 100 + "%";
    }, 4)
}

function setPlayback(event){
    console.log(event.clientX);
    let rect = totalLength.getBoundingClientRect();
    let newLength = filmPlayer.duration * ((event.clientX - rect.left) / rect.width);
    filmPlayer.currentTime = newLength;
}

function previewPlayback(event){
    console.log(event.clientX);
    let rect = totalLength.getBoundingClientRect();
    let previewLength = ((event.clientX - rect.left) / rect.width * 100);
    playedLength.style.width = previewLength;
}


episodesShowButton.addEventListener("click", toggleEpisodesPanel);
episodesCloseButton.addEventListener("click", toggleEpisodesPanel);

videoControls.addEventListener("click", videoPausePlay);
playButtonPlayback.addEventListener("click", videoPausePlay);
pauseButtonPlayback.addEventListener("click", videoPausePlay);

soundControlButtonLoud.addEventListener("click", soundOnOff);
soundControlButtonMute.addEventListener("click", soundOnOff);

fullscreenButton.addEventListener("click", fullscreen);

playButton.addEventListener("click", showVideo);
backButton.addEventListener("click", hideVideo);

window.addEventListener("keydown", checkKeyPressed);

function checkKeyPressed(event){
    if (event.keyCode == "32") {
        videoPausePlayKey();
    }
}

totalLength.addEventListener("click", setPlayback);
//totalLength.addEventListener("mouseover", previewPlayback);