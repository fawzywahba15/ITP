<?php

// Connect to the database
$host = "localhost";
$user = "fawzy";
$password = "mypassword";
$dbname = "regestrieren";

$conn = mysqli_connect($host, $user, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the values of the title and text inputs
$title = $_POST['title'];
$text = $_POST['text'];
$fk_admin_id = 30;

// Insert the article into the database
$sql = "INSERT INTO `news_beiträge` (title, `text`, `timestamp`, fk_admin_id) VALUES ('$title', '$text', current_timestamp, '$fk_admin_id')";
mysqli_query($conn, $sql);


// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

include_once "news_beiträge.php";

