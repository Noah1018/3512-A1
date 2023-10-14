<?php
require_once 'database.php';

function getSongDetails($song_id) {
    $conn = connect();
    
    $query = $conn->prepare("SELECT 
                                songs.song_id, songs.title, artists.artist_name, genres.genre_name, types.type_name,
                                songs.year, songs.bpm, songs.energy, songs.danceability, songs.loudness, songs.liveness,
                                songs.valence, songs.duration, songs.acousticness, songs.speechiness, songs.popularity
                             FROM songs 
                             JOIN artists ON songs.artist_id = artists.artist_id 
                             JOIN genres ON songs.genre_id = genres.genre_id 
                             JOIN types ON artists.artist_type_id = types.type_id
                             WHERE songs.song_id = :song_id");
    $query->bindParam(":song_id", $song_id);
    $query->execute();
    
    return $query->fetch(PDO::FETCH_ASSOC);
}

function getAllArtists() {
    $conn = connect();

    $query = "SELECT artist_id, artist_name FROM artists ORDER BY artist_name ASC";
    $stmt = $conn->prepare($query);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getAllGenres() {
    $conn = connect();
    
    $query = "SELECT * FROM genres";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    
    return $stmt->fetchAll(PDO::FETCH_ASSOC); 
}




// Add functions 
?>
