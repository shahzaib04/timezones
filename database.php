<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = 'timezone_db';

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$query = "SELECT * FROM ".$db.".offers ORDER BY id DESC";
$result = $conn->query($query);

$conn->close();

?>
