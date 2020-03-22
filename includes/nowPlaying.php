<?php 
    $songQuery = mysqli_query($con, "SELECT id FROM Songs ORDER BY RAND() LIMIT 10");
    $result_array = array();
    while($row = mysqli_fetch_array($songQuery)){
        array_push($result_array, $row['id']);
    }
    $jsonArray = json_encode($result_array);
    //echo $jsonArray;
?>

<script>
    $(document).ready(function(){
        currentPlaylist = <?php echo $jsonArray; ?>;
        audioElement = new Audio();
        setTrack(currentPlaylist[0], currentPlaylist, false)
    });
    function setTrack(trackId, newPlaylist, play){
        // This is an Ajax call, you say what page the call to, what values do you want to pass through, and what you want to do with the information
        $.post("includes/handlers/ajax/getSongJson.php", { songId: trackId }, function(data){

            var track = JSON.parse(data);

            $(".trackName").text(track.title);
            
            console.log(track)

            $.post("includes/handlers/ajax/getArtistJson.php", { artistId: track.artist }, function(data){
                var artist = JSON.parse(data);
                console.log(artist.name);

                $(".artistName").text(artist.name);
            });

            $.post("includes/handlers/ajax/getAlbumJson.php", { albumId: track.album }, function(data){
                var album = JSON.parse(data);

                $("#nowPlayingLeft img").attr("src", album.artworkPath);
            });

        });
        if(play) {
            playSong();
        }
    }
    function playSong(){
        if(audioElement.audio.currentTime == 0){
            console.log("update")
        } else {
            console.log('dont update')
        }
        $(".far.fa-play-circle.controlButton").hide()
        $(".far.fa-pause-circle.controlButton").show()
        audioElement.play();
    }
    function pauseSong(){
        $(".far.fa-play-circle.controlButton").show()
        $(".far.fa-pause-circle.controlButton").hide()
        audioElement.pause();
    }
</script>

<div id="nowPlayingBar">
    <div id="nowPlayingLeft">
        <div class="content contentLeft">
            <img src="" alt="">
            <div class="trackInfo">
                <span class="trackName"></span>
                <span class="artistName"></span>
            </div>
        </div>
    </div>
    <div id="nowPlayingCenter">
        <div class="content playerControls">
            <div class="buttons">
                <i class="fas fa-random controlButton" title="Shuffle"></i>
                <i class="far fa-arrow-alt-circle-left controlButton" title="Previous"></i>
                <i class="far fa-play-circle controlButton" title="Play" onClick="playSong()"></i>
                <i class="far fa-pause-circle controlButton" title="Pause" onClick="pauseSong()" style="display: none"></i>
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