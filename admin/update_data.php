<?php
$userid = $_POST["id"];
$username = $_POST["username"];
$first_name = $_POST["first_name"];
$usermail = $_POST["usermail"];
$password = $_POST["password"];
// Get the values of the POST variables


// Connect to the database and update the data
$conn = mysqli_connect("localhost", "fawzy", "mypassword", "regestrieren");
$sql = "UPDATE login SET username = '$username', `first_name` = '$first_name', usermail = '$usermail', password = '$password' WHERE id = '$userid'";
mysqli_query($conn, $sql);

// Close the connection
mysqli_close($conn);

?>