<?php include("includes/header.php"); ?>

    <h1>You Might Also Like</h1>
    <div class="grid">
        <?php 
            $albumQuery = mysqli_query($con, 'SELECT * FROM albums ORDER BY RAND() LIMIT 4');
            while($row = mysqli_fetch_array($albumQuery)){

                echo "<div class='gridItem'>
                        <a href='album.php?id=" . $row['id'] . "'>
                            <img src='" . $row['artworkPath'] . "'>
                            <h3>" . $row['title'] . "</h3>
                        </div> </a>";
            }
        ?>
    </div>

<?php include("includes/footer.php"); ?>