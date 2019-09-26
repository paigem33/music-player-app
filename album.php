<?php include("includes/header.php"); 

    //this is how you get info from url
    if(isset($_GET['id'])){
        $albumId = $_GET['id'];
    } else {
        header("Location: index.php");
    }

    $albumQuery = mysqli_query($con, "SELECT * FROM albums WHERE id='$albumId'");
    //convert result into array
    $album = mysqli_fetch_array($albumQuery);
    //get artist id from the album
    $artistId = $album['artist'];

    $artistQuery = mysqli_query($con, "SELECT * FROM artists WHERE id='$artistId'");
    $artist = mysqli_fetch_array($artistQuery);
    echo $album['title'];
    echo $artist['name'];
?>

    

<?php include("includes/footer.php"); ?>