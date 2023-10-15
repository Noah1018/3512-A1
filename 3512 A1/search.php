<?php
include 'functions.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Search A Song</title>
    <link rel="stylesheet" href="css/SearchPage.css">
    <link rel="stylesheet" href="css/footer.css">
</head>
<body>
<?php include('header.php') ?>
<h2>Basic Song Search</h2>
    <form action="search-results.php" method="get">
    Search by: <br>

    <div class="title">
    <input type="radio" name="searchType" value="title"> Title
    <input type="text" name="title"><br>
    </div>
<br>
<div class="AG">
    <input type="radio" name="searchType" value="artist"> Artist
    <select name="artist_id"> <option value="">--Select an Artist--</option>
    <?php
    $artists = getAllArtists(); 
    foreach ($artists as $artist) {
        echo "<option value='" . $artist["artist_id"] . "'>" . $artist["artist_name"] . "</option>";
    }
    ?>
    </select>

    

    
    <input type="radio" name="searchType" value="genre"> Genre
    <select name="genre_id"> <option value="">--Select a Genre--</option>
    <?php
    $genres = getAllGenres();
    foreach ($genres as $genre) {
        echo "<option value='" . $genre["genre_id"] . "'>" . $genre["genre_name"] . "</option>";
    }
    ?>
    </select>
    </div>


    <div class="Year" >
    <br>
    <input type="radio" name="searchType" value="yearEquals"> Year
    <!-- <input type="text" name="yearValue">-->
    

    <input type="radio" name="searchType" value="yearLessThan">Less
    <input type="text" name="less">

    <input type="radio" name="searchType" value="yearGreaterThan">Greater
    <input type="text" name="great"><br>

    
    </div>
<br>
    
    <input type="submit" name= "search" value="Search">
</form>


<footer>
    <h4>Copyright Noah & Dallas - COMP 3512 - Assignment 1</h4>
<a href="https://github.com/Noah1018/3512-A1"> Our Repository</a>
<a href="https://github.com/Noah1018">Noah's github</a>
<a href="https://github.com/dmax98">Dallas' github</a>
    </footer>
</body>
</html>
