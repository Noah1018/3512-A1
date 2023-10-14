<?php
require_once 'config.php';

function connect() {
    try {
        $conn = new PDO('sqlite:./data/music.db');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        exit;
    }
}
?>
