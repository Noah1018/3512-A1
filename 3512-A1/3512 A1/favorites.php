<?php
session_start();
include 'functions.php';
$conn = connect();


if (isset($_GET['action'])) {
    $action = $_GET['action'];

    if (isset($_GET['songID'])) {
        $song_id = $_GET['songID'];
    } else {
        
        die("Song ID is not specified."); 
    }

    switch ($action) {
        case 'add':
            if (!isset($_SESSION['favorites'])) {
                $_SESSION['favorites'] = [];
            }
            if (!in_array($song_id, $_SESSION['favorites'])) {
                $_SESSION['favorites'][] = $song_id;
            }
            break;

        case 'remove':
            if (isset($_SESSION['favorites'])) {
                $index = array_search($song_id, $_SESSION['favorites']);
                if ($index !== false) {
                    unset($_SESSION['favorites'][$index]);
                }
            }
            break;

        case 'clear':
            unset($_SESSION['favorites']);
            break;
    }
}
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

    
    <section>
    <div class="content">
        <table class="browse">
            <tr>
                <th>Title</th>
                <th>Artist</th>
                <th>Year</th>
                <th>Genre</th>

            </tr>

            <?php
            if (isset($_SESSION['favorites']) && count($_SESSION['favorites']) > 0) {
                
                
                $song_ids_array = array_filter($_SESSION['favorites'], function($value) {
                    return is_numeric($value) && $value > 0; 
                });
                
                if (empty($song_ids_array)) {
                    die('Invalid song IDs');
                }

                $song_ids = implode(",", $song_ids_array);
                $sql = "SELECT songs.*, artists.artist_name, genres.genre_name 
                FROM songs 
                JOIN artists ON songs.artist_id = artists.artist_id 
                JOIN genres ON songs.genre_id = genres.genre_id 
                WHERE songs.song_id IN ($song_ids)";

                $result = $conn->query($sql);
                
                foreach ($result as $song) {
                    ?>
                    <tr>
                        <td><?= $song['title'] ?></td>
                        <td><?= $song['artist_name'] ?></td>
                        <td><?= $song['year'] ?></td>
                        <td><?= $song['genre_name'] ?></td>
                        
                        <td>
                            <a href='favorites.php?action=remove&songID=<?= $song['song_id'] ?>'>Remove</a>
                        </td>
                    </tr>
                    <?php
                }
            } else {
                echo "<tr><td colspan='6'>No songs in favorites!</td></tr>";
            }
            ?>
        </table>

        <?php
        if (isset($_SESSION['favorites']) && count($_SESSION['favorites']) > 0) {
            echo "<a href='favorites.php?action=clear'>Clear All Favorites</a>";
        }
        ?>
    </div>
</section>



</div>

</section>
    <footer>
        <!-- Add Footer here -->
    </footer>
</body>
</html>