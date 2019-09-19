<?php

    //brings in session start method
    include("includes/config.php");


    if(isset($_SESSION['userLoggedIn'])){
        $userLoggedIn = $_SESSION['userLoggedIn'];
    } else {
        header("Location: register.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="assets/scripts/index.js"></script>
</head> 
    <div id="nowPlaying">
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
    </div>
</body>
</html>