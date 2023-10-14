
<?php
include 'functions.php';
$conn = connect();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/HomePage.css">
    <link rel="stylesheet" href="css/footer.css">
    <title>Home Page</title>
    </head>

<body>
    <?php include('header.php') ?>

<div class="home_container">

    <!-- Top Genres -->
    <div class="homepage_grid top-genres">
        <h3>Top Genres</h3>
        <ul>
        <?php
            $sqlTopGenres = "SELECT genres.genre_name, COUNT(songs.song_id) as number_of_songs FROM genres 
                             JOIN songs ON genres.genre_id = songs.genre_id 
                             GROUP BY genres.genre_id 
                             ORDER BY number_of_songs DESC 
                             LIMIT 10";
            $result = $conn->query($sqlTopGenres);
            foreach ($result as $row) {
                echo "<li>" . $row["genre_name"] . " (" . $row["number_of_songs"] . " songs)</li>";
            }
        ?>
        </ul>
    </div>

    <!-- Top Artists -->
    <div class="homepage_grid top-artist">
        <h3>Top Artists</h3>
        <ul>
        <?php
            $sqlTopArtists = "SELECT artists.artist_name, COUNT(songs.song_id) as number_of_songs FROM artists 
                              JOIN songs ON artists.artist_id = songs.artist_id 
                              GROUP BY artists.artist_id 
                              ORDER BY number_of_songs DESC 
                              LIMIT 10";
            $result = $conn->query($sqlTopArtists);
            foreach ($result as $row) {
                echo "<li>" . $row["artist_name"] . " (" . $row["number_of_songs"] . " songs)</li>";
            }
        ?>
        </ul>
    </div>

    <!-- Most Popular Songs -->
    <div class="homepage_grid top-songs">
        <h3>Most Popular Songs</h3>
        <ul>
        <?php
            $sqlPopularSongs = "SELECT songs.title, artists.artist_name, songs.song_id FROM songs 
                                JOIN artists ON songs.artist_id = artists.artist_id 
                                ORDER BY songs.popularity DESC 
                                LIMIT 10";
            $result = $conn->query($sqlPopularSongs);
            foreach ($result as $row) {
                echo "<li><a href='single-page.php?songID=" . $row["song_id"] . "'>" . $row["title"] . "</a> by " . $row["artist_name"] . "</li>";
            }
        ?>
        
        </ul>
    </div>
    <!-- One-Hit Wonders -->
<div class="homepage_grid one-hit">
    <h3>One-Hit Wonders</h3>
    <ul>
    <?php
        $sqlOneHit = "SELECT songs.title, artists.artist_name, songs.song_id, songs.popularity
                      FROM songs 
                      JOIN artists ON songs.artist_id = artists.artist_id 
                      WHERE artists.artist_id IN 
                      (SELECT artist_id FROM songs GROUP BY artist_id HAVING COUNT(song_id) = 1)
                      ORDER BY songs.popularity DESC
                      LIMIT 10";
        $result = $conn->query($sqlOneHit);
        foreach ($result as $row) {
            echo "<li><a href='single-page.php?songID=" . $row["song_id"] . "'>" . $row["title"] . "</a> by " . $row["artist_name"] . "</li>";
        }
    ?>
    </ul>
</div>

<!-- Longest Acoustic Song -->
<div class="homepage_grid long">
    <h3>Longest Acoustic Song (Acousticness > 40)</h3>
    <ul>
    <?php
        $sqlLongAcoustic = "SELECT songs.title, artists.artist_name, songs.song_id
                            FROM songs 
                            JOIN artists ON songs.artist_id = artists.artist_id 
                            WHERE songs.acousticness > 40
                            ORDER BY songs.duration DESC 
                            LIMIT 10";
        $result = $conn->query($sqlLongAcoustic);
        foreach ($result as $row) {
            echo "<li><a href='single-page.php?songID=" . $row["song_id"] . "'>" . $row["title"] . "</a> by " . $row["artist_name"] . "</li>";
        }
    ?>
    </ul>
</div>

<!-- At the Club -->
<div class="homepage_grid club">
    <h3>At the Club (Danceability > 80)</h3>
    <ul>
    <?php
        $sqlClub = "SELECT songs.title, artists.artist_name, songs.song_id,
                    (songs.danceability * 1.6 + songs.energy * 1.4) AS club_rating
                    FROM songs 
                    JOIN artists ON songs.artist_id = artists.artist_id 
                    WHERE songs.danceability > 80
                    ORDER BY club_rating DESC 
                    LIMIT 10";
        $result = $conn->query($sqlClub);
        foreach ($result as $row) {
            echo "<li><a href='single-page.php?songID=" . $row["song_id"] . "'>" . $row["title"] . "</a> by " . $row["artist_name"] . "</li>";
        }
    ?>
    </ul>
</div>

<!-- Running Songs (bpm between 120-125) -->
<div class="homepage_grid run">
    <h3>Running Songs (BPM: 120-125)</h3>
    <ul>
    <?php
        $sqlRunning = "SELECT songs.title, artists.artist_name, songs.song_id,
                       (songs.energy * 1.3 + songs.valence * 1.6) AS run_rating
                       FROM songs 
                       JOIN artists ON songs.artist_id = artists.artist_id 
                       WHERE songs.bpm BETWEEN 120 AND 125
                       ORDER BY run_rating DESC 
                       LIMIT 10";
        $result = $conn->query($sqlRunning);
        foreach ($result as $row) {
            echo "<li><a href='single-page.php?songID=" . $row["song_id"] . "'>" . $row["title"] . "</a> by " . $row["artist_name"] . "</li>";
        }
    ?>
    </ul>
</div>

<!-- Studying (bpm between 100-115 and speechiness between 1-20) -->
<div class="homepage_grid study">
    <h3>Studying (BPM: 100-115, Speechiness: 1-20)</h3>
    <ul>
    <?php
        $sqlStudying = "SELECT songs.title, artists.artist_name, songs.song_id,
                        (songs.acousticness * 0.8 + (100 - songs.speechiness) + (100 - songs.valence)) AS study_rating
                        FROM songs 
                        JOIN artists ON songs.artist_id = artists.artist_id 
                        WHERE songs.bpm BETWEEN 100 AND 115 AND songs.speechiness BETWEEN 1 AND 20
                        ORDER BY study_rating DESC 
                        LIMIT 10";
        $result = $conn->query($sqlStudying);
        foreach ($result as $row) {
            echo "<li><a href='single-page.php?songID=" . $row["song_id"] . "'>" . $row["title"] . "</a> by " . $row["artist_name"] . "</li>";
        }
    ?>
    </ul>
</div>


</body>

<footer>
    <h4>Copyright Noah & Dallas - COMP 3512 - Assignment 1</h4>
<a href="https://github.com/Noah1018/3512-A1"> Our Repository</a>
<a href="https://github.com/Noah1018">Noah's github</a>
<a href="https://github.com/dmax98">Dallas' github</a>
    </footer>
</html>