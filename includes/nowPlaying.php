<?php 

    $songQuery = mysqli_query($con, "SELECT id FROM Songs ORDER BY RAND() LIMIT 10");
    $result_array = array();
    while($row = mysqli_fetch_array($songQuery)){
        array_push($result_array, $row['id']);
    }

    $jsonArray = json_encode($result_array);

?>

<script>
    $(document).ready(function(){
        currentPlaylist = <?php $jsonArray; ?>
        audioElement = new Audio();
        setTrack(currentPlaylist[0], currentPlaylist, true)
    });

    function setTrack(trackId, newPlaylist, play){
        audioElement.setTrack("assets/music/bensound-happyrock.mp3")
        if(play == true) {
            audioElement.play();
        }
    }
</script>

<div id="nowPlayingBar">
    <div id="nowPlayingLeft">
        <div class="content contentLeft">
            <img src="assets/images/album.png" alt="">
            <div class="trackInfo">
                <span class="trackName">Ch-Check It Out</span>
                <span class="artistName">Beastie Boys</span>
            </div>
        </div>
    </div>
    <div id="nowPlayingCenter">
        <div class="content playerControls">
            <div class="buttons">
                <i class="fas fa-random controlButton" title="Shuffle"></i>
                <i class="far fa-arrow-alt-circle-left controlButton" title="Previous"></i>
                <i class="far fa-play-circle controlButton" title="Play"></i>
                <i class="far fa-pause-circle controlButton" title="Pause" style="display: none"></i>
                <i class="far fa-arrow-alt-circle-right controlButton" 
                title="Next"></i>
                <i class="fas fa-redo controlButton" title="Repeat"></i>
            </div>
            <div class="playbackBar">
                <span class="progressTime current">0:00</span>
                <div class="progressBar">
                    <div class="progressBg">
                        <div class="progress"></div>
                    </div>
                </div>
                <span class="progressTime remaining">0:00</span>
            </div>
        </div>
    </div>
    <div id="nowPlayingRight">
        <div class="volumeBar">
            <i class="fas fa-volume-up"></i>
            <div class="progressBar">
                <div class="progressBg">
                    <div class="progress"></div>
                </div>
            </div>
        </div>
    </div>
</div>