<?php
$id = $_POST["id"];
$username = $_POST["username"];
$first_name = $_POST["first_name"];
$usermail = $_POST["usermail"];
echo $usermail;
// Get the values of the POST variables


// Connect to the database and update the data
$conn = mysqli_connect("localhost", "fawzy", "mypassword", "regestrieren");
$sql = "UPDATE login SET username = '$username', `first_name` = '$first_name', usermail = '$usermail', id = '$id' WHERE id = '$id'";
mysqli_query($conn, $sql);

// Close the connection
mysqli_close($conn);

