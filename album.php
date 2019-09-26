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
        <h1><?php echo $album->getTitle(); ?></h1>
        <h2>By <?php echo $artist->getName(); ?></h2>
        <p><?php echo $album->getSongs(); ?> song(s)</p>
    </div>
</div>

    

<?php include("includes/footer.php"); ?>