<?php
include "../1.übung/main.php";
// Get the values of the POST variables
$username = $_POST["username"];
$first_name = $_POST["first_name"];
$usermail = $_POST["usermail"];

// Connect to the database and update the data
$conn = mysqli_connect("localhost", "fawzy", "mypassword", "regestrieren");
$sql = "UPDATE login SET username = '$username', first_name = '$first_name', usermail = '$usermail' WHERE username = '$username'";
mysqli_query($conn, $sql);

// Close the connection
mysqli_close($conn);

