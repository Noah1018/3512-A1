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
<title>Single Song Page</title>
    <link rel="stylesheet" href="css/SingleSongPage.css">
    <link rel="stylesheet" href="css/footer.css">

</head>
<body>
<?php include('header.php') ?>
 <div class="song-list">
    <main>
        <h2>Song Information</h2>

        <strong>Title:</strong> <?php echo $song['title']; ?>
        <strong>Artist:</strong> <?php echo $song['artist_name']; ?>
        <strong>Genre:</strong> <?php echo $song['genre_name']; ?>
        <strong>Year:</strong> <?php echo $song['year']; ?>
        <strong>duration:</strong> <?php echo $song['duration']; ?>

<h3>Analysis Data:</h3>
        <li><strong>BPM:</strong> <?php echo $song['bpm']; ?></li>
        <li><strong>energy:</strong> <?php echo $song['energy']; ?></li>
        <li><strong>danceability:</strong> <?php echo $song['danceability']; ?></li>
        <li><strong>loudness:</strong> <?php echo $song['loudness']; ?></li>
        <li><strong>liveness:</strong> <?php echo $song['liveness']; ?></li>
        <li><strong>valence:</strong> <?php echo $song['valence']; ?></li>
        <li><strong>acousticness:</strong> <?php echo $song['acousticness']; ?></li>
        <li><strong>speechiness:</strong> <?php echo $song['speechiness']; ?></li>
        <li><strong>popularity:</strong> <?php echo $song['popularity']; ?></li>
      

    </main>
    </div>
    <footer>
    <h4>Copyright Noah & Dallas - COMP 3512 - Assignment 1</h4>
<a href="https://github.com/Noah1018/3512-A1"> Our Repository</a>
<a href="https://github.com/Noah1018">Noah's github</a>
<a href="https://github.com/dmax98">Dallas' github</a>
    </footer>
</body>
</html>

