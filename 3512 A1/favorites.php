<?php
session_start();
include 'functions.php';
$conn = connect();


if (isset($_GET['action'])) {
    $action = $_GET['action'];

    if ($action === 'add' || $action === 'remove') {
        if (isset($_GET['songID'])) {
            $song_id = $_GET['songID'];
        } else {
            die("Song ID is not specified.");
        }
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
    <link rel="stylesheet" href="css/Favorites.css">
    <link rel="stylesheet" href="css/footer.css">
 
</head>
<body>
<?php include('header.php') ?>
<h2>Favorites</h2>

    <section>
    <div class="content">
        <h2>Favorites
           
        </h2>
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
                        
                        <td><a href='favorites.php?action=remove&songID=<?= $song['song_id'] ?>'>Remove</a> </td>
                        <td><a class="Button" href="single-song-page.php?songID=<?=$song["song_id"]?>">View</a></td>
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
    <h4>Copyright Noah & Dallas - COMP 3512 - Assignment 1</h4>
<a href="https://github.com/Noah1018/3512-A1"> Our Repository</a>
<a href="https://github.com/Noah1018">Noah's github</a>
<a href="https://github.com/dmax98">Dallas' github</a>
    </footer>
</body>
</html>
