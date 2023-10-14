<?php
include 'functions.php';


if(isset($_GET['songID'])) {
    $song_id = $_GET['songID'];
    $song = getSongDetails($song_id);
} else {

    die("No song selected.");
}


?>
<!DOCTYPE html>
<html>
<head>
    <title>Single Song - COMP 3512 Assign1</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>COMP 3512 Assign1</h1>
        <h2>Your Name</h2>
        <nav>
            <ul>
                
                <li><a href="Homepage.php">HOME</a></li>
                <li><a href="search.php">SEARCH</a></li>
                <li><a href="search-results.php">SEARCH RESULTS</a></li>
                <li><a href="single-page.php">SINGLE SONG</a></li>
                <li><a href="favorites.php">Favorites</a></li>
                <li><a href="about-us.php">About Us</a></li>
            </ul>

        </nav>
    </header>

    <main>
        <h2>Song Details</h2>
        <p><strong>Title:</strong> <?php echo $song['title']; ?></p>
        <p><strong>Artist:</strong> <?php echo $song['artist_name']; ?></p>
        <p><strong>Genre:</strong> <?php echo $song['genre_name']; ?></p>
        <p><strong>Year:</strong> <?php echo $song['year']; ?></p>
        <p><strong>BPM:</strong> <?php echo $song['bpm']; ?></p>
        <p><strong>energy:</strong> <?php echo $song['energy']; ?></p>
        <p><strong>danceability:</strong> <?php echo $song['danceability']; ?></p>
        <p><strong>loudness:</strong> <?php echo $song['loudness']; ?></p>
        <p><strong>liveness:</strong> <?php echo $song['liveness']; ?></p>
        <p><strong>valence:</strong> <?php echo $song['valence']; ?></p>
        <p><strong>duration:</strong> <?php echo $song['duration']; ?></p>
        <p><strong>acousticness:</strong> <?php echo $song['acousticness']; ?></p>
        <p><strong>speechiness:</strong> <?php echo $song['speechiness']; ?></p>
        <p><strong>popularity:</strong> <?php echo $song['popularity']; ?></p>


    </main>

    <footer>
      <!-- Add Footer here -->
    </footer>
</body>
</html>

