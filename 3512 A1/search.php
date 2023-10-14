<?php
include 'functions.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Search A Song</title>
    <link rel="stylesheet" href="css/SearchPage.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/Header.css">
</head>
<body>
    <header>
    <h1>COMP 3512 Assignment 1</h1>
        <h2>Noah & Dallas</h2>
        <nav>
        <ul>
                
                <li><a href="Homepage.php">Home</a></li>
                <li><a href="search.php">Search</a></li>
                <li><a href="search-results.php">Search Results</a></li>
                <li><a href="single-page.php">Single Song </a></li>
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
    <h4>Copyright Noah & Dallas - COMP 3512 - Assignment 1</h4>
<a href="https://github.com/Noah1018/3512-A1"> Our Repository</a>
<a href="https://github.com/Noah1018">Noah's github</a>
<a href="https://github.com/dmax98">Dallas' github</a>
    </footer>
</body>
</html>
