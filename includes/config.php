<?php
    //this says hold on to all the data until it is all there
    ob_start();

    //without this the sessions wont work, and you need sessions to track if the user is logged in
    // session_start();

    $timezone = date_default_timezone_set("America/Los_Angeles");

    $con = mysqli_connect("localhost", "root", "", "music-player-app");

    if(mysqli_connect_errno()){
        echo "Failed to connect: " . mysqli_connect_errno();
    }
?>