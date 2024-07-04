// Function to toggle audio playback
function toggleAudio() {
    var audio = document.getElementById("backgroundAudio");
    var audioIcon = document.querySelector(".audio-toggle-btn i");
    
    if (audio.paused) {
        audio.play();
        audioIcon.classList.remove("fa-volume-off");
        audioIcon.classList.add("fa-volume-up");
    } else {
        audio.pause();
        audioIcon.classList.remove("fa-volume-up");
        audioIcon.classList.add("fa-volume-off");
    }
}
