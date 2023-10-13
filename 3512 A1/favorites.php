<?php
include 'functions.php';



?>
<!DOCTYPE html>
<html>
<head>
<title>Favourites Page</title>
    <meta charset=utf-8>
    <link rel="stylesheet" href="css/ViewFavorites.css">
</head>
<body>
    <header>
        <h1>COMP 3512 Assign1</h1>
        <h2>Your Name</h2>
        <nav>
            <a href="index.php">Home</a>
            <a href="search.php">Browse</a>

        </nav>
    </header>

    <!-- Add home page content here -->
    <section>

        

<div class="table-container">
<?php echo "<a href='browse.php?$queryS'><button class='return'>Return to Browse Results</button></a>"; ?>
    <table>
        <tr>
            <th>Song</th>
            <th>Artist</th>
            <th>Year</th>
            <th>Genre</th>
            <th>Popularity</th>
            <th>
                <?php echo "<a href='removeFavorites.php?$queryS'><button class='rmAll'>Remove All</button></a>"; ?>
            </th>
            <th>View</th>
        </tr>
        <?php
        
        if( !empty($_GET["text"]) ){
            echo $_GET["text"]; 
        }

        
        foreach($favorites as $fav){
            outputFav($songsGateway->generateSong($fav), $queryS);
        }

        echo "</table>";
                
        ?>

    </table>

</div>

</section>
    <footer>
        <!-- Add Footer here -->
    </footer>
</body>
</html>
