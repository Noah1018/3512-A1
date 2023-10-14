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
        <h2>Basic Song Search</h2>
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

    <form action="search-results.php" method="get">
    Search by: <br>
    <input type="radio" name="searchType" value="title"> Title
    <input type="text" name="title"><br>
    
    <input type="radio" name="searchType" value="artist"> Artist
    <select name="artist_id"> <option value="">--Select an Artist--</option>
    <?php
    $artists = getAllArtists(); 
    foreach ($artists as $artist) {
        echo "<option value='" . $artist["artist_id"] . "'>" . $artist["artist_name"] . "</option>";
    }
    ?>
    </select>
    <br>
    <input type="radio" name="searchType" value="genre"> Genre
    <select name="genre_id"> <option value="">--Select a Genre--</option>
    <?php
    $genres = getAllGenres();
    foreach ($genres as $genre) {
        echo "<option value='" . $genre["genre_id"] . "'>" . $genre["genre_name"] . "</option>";
    }
    ?>
    </select>
    <br>
    <input type="radio" name="searchType" value="yearEquals"> Year
    <input type="text" name="yearValue"><br>

    <input type="radio" name="searchType" value="yearGreaterThan">Greater
    <input type="text" name="yearGreaterThan"><br>

    <input type="radio" name="searchType" value="yearLessThan">Less
    <input type="text" name="yearLessThan"><br>


    
    <input type="submit" value="Search">
</form>


    <footer>
        <!-- Add Footer here -->
    </footer>
</body>
</html>
