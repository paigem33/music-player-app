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
    <link rel="stylesheet" href="assets/css/style.css">
</head> 
    <div id="nowPlaying">
        <div id="nowPlayingBar">
            <div id="nowPlayingInner">

            </div>
            <div id="nowPlayingInner">
                
            </div>
            <div id="nowPlayingInner">
                
            </div>
        </div>
    </div>
</body>
</html>