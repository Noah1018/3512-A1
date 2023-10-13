<?php
include 'functions.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>COMP 3512 Assign1</title>
    <link rel="stylesheet" href="css/style.css">
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
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/browseResults.css">
    <title>Browse Results</title>
</head>
<body>
<header class="header">
        <h1>COMP 3512 Assign1</h1>
        <nav>
            <ul>
                <!-- could add icons -->
                <li><a href="Homepage.php">HOME</a></li>
                <li><a href="search-result.php">BROWSE</a></li>
                <li><a href="search.php">SEARCH</a></li>
                <li><a href="About-US.php">About Us</a></li>
            </ul>

        </nav>

    </header>
    <div class="content">
        <table class="browse">
            <tr>
                <th>Title</th>
                <th>Artist</th>
                <th>Year</th>
                <th>Genre</th>
                <th>Popularity</th>
            </tr>
            <?php
            foreach($songs as $curr){
                ?>
                <tr>
                    <td><?=$curr['title']?></td>
                    <td><?=$curr['artist_name']?></td>
                    <td class="table_year"><?=$curr['year']?></td>
                    <td><?=$curr['genre_name']?></td>
                    <td><?=$curr['popularity']?></td>
                    <td><a class="Button" href="addToFavorites.php?AddID=<?=$curr["song_id"]?>">
                        Add to Favorites
                    </a></td>
                    <td><a class="Button" href="single-song.php?curr=si&songID=<?=$curr["song_id"]?>">
                        View
                    </a></td>
                </tr>  
                <?php
            }
            
            ?>
        </table>    
    </div> 
    <footer>
        <!-- Add Footer here -->
    </footer>
</body>
</html>
