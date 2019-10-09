<?php include("includes/header.php"); 
      include("includes/footer.php"); 

    //this is how you get info from url
    if(isset($_GET['id'])){
        $albumId = $_GET['id'];
    } else {
        header("Location: index.php");
    }
    $album = new Album($con, $albumId);
    //going into the album class and calling the getArtist function there. It knows which one to do because $album is created with the id
    $artist = $album->getArtist();
?>

<div class="albumInfo">
    <div class="albumHeader"> 
        <img src="<?php echo $album->getArtworkPath(); ?>" alt="">
        <div>
        <h1><?php echo $album->getTitle(); ?></h1>
        <h2>By <?php echo $artist->getName(); ?></h2>
        <p><?php echo $album->getSongs(); ?> song(s)</p>
        </div>
    </div>
    <ul class="albumContent">

        <?php
           $songIdArray = $album->getSongIds();
           $i = 1;
           foreach($songIdArray as $songId){
               $albumSong = new Song($con, $songId);
               $albumArtist = $album->getArtist();
               echo "<li>
                        <div>
                            <i class='fas fa-play'></i>
                            <span class='number'>$i.</span>
                        </div>
                        <div>
                            <span class='title'>" . $albumSong->getTitle() . "</span>
                            <span class='artist'> - " . $albumArtist->getName() . "</span>
                        </div>
                        <div>
                            <i class='fas fa-ellipsis-h'></i>
                        </div>
                        <div>
                            <span class='duration'>" . $albumSong->getDuration() . "</span>
                        </div>
                    </li>";
                    $i++;
           }
           
        ?>
    
    </ul>
</div>

    

<?php include("includes/footer.php"); ?>