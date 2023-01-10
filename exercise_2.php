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
$sql = "INSERT INTO news_beiträge (title, text, `timestamp`, fk_admin_id) VALUES ('$title', '$text', current_timestamp, '$fk_admin_id')";
mysqli_query($conn, $sql);



// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Select the articles from the database
$sql = "SELECT * FROM `news_beiträge` ORDER BY timestamp DESC";
$result = mysqli_query($conn, $sql);

// Display the articles
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo '<article>';
        echo '<h2>' . $row['title'] . '</h2>';
        echo '<p>' . $row['text'] . '</p>';
        echo '<p>' . $row['timestamp'] . '</p>';
        echo '</article>';
    }
} else {
    echo "No articles found.";
}

// Close the connection
mysqli_close($conn);
?>


