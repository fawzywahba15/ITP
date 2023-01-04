<?php
$userid = $_POST["id"];
$username = $_POST["username"];
$first_name = $_POST["first_name"];
$usermail = $_POST["usermail"];

$password = $_POST["password"];
$conn = mysqli_connect("localhost", "fawzy", "mypassword", "regestrieren");
if (empty($password)){
    // Connect to the database and update the data

    $sql = "UPDATE login SET username = '$username', `first_name` = '$first_name', usermail = '$usermail' WHERE id = '$userid'";
    mysqli_query($conn, $sql);

// Close the connection
    mysqli_close($conn);


}else{
    // Connect to the database and update the data
    $new_password = hash($password,PASSWORD_DEFAULT);
    $sql = "UPDATE login SET username = '$username', `first_name` = '$first_name', usermail = '$usermail', password = '$new_password' WHERE id = '$userid'";
    mysqli_query($conn, $sql);

// Close the connection
    mysqli_close($conn);
}





?>