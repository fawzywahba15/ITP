<?php
$userid = $_POST["id"];
$username = $_POST["username"];
$first_name = $_POST["first_name"];
$usermail = $_POST["usermail"];
$user_status = $_POST["status"];
$password = $_POST["password"];
$hashed_pw = password_hash($password, PASSWORD_DEFAULT);

if (empty($password)){
    // Connect to the database and update the data
    $conn = mysqli_connect("localhost", "fawzy", "mypassword", "regestrieren");
    $sql = "UPDATE login SET username = '$username', `first_name` = '$first_name', usermail = '$usermail', status = '$user_status' WHERE id = '$userid'";
    $result = mysqli_query($conn, $sql);




}else{
    // Connect to the database and update the data
    //$new_password = hash($password,PASSWORD_DEFAULT);
    $conn = mysqli_connect("localhost", "fawzy", "mypassword", "regestrieren");
    $sql = "UPDATE login SET username = '$username', `first_name` = '$first_name', usermail = '$usermail', password = '$hashed_pw', status = '$user_status'  WHERE id = '$userid'";
    mysqli_query($conn, $sql);

// Close the connection

}

mysqli_close($conn);



?>