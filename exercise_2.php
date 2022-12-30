<?php
require_once ('exercise.php');
if(isset($_POST["username"]) && !empty($_POST["username"])
    && isset($_POST["password"]) && !empty($_POST["password"])
    && isset($_POST["useremail"]) && !empty($_POST["useremail"])) {
    $_POST["password"] = password_hash($_POST["password"], PASSWORD_DEFAULT);
//create $db_obj, create sql statement, prepare it and bind the variables to it
    $host = 'localhost';
    $user = 'fawzy';
    $password = 'mypassword';
    $database = 'regestrieren';
    $db_obj = new mysqli($host, $user, $password, $database);
    $sql =
        "INSERT INTO `login` (`username`, `password`)
VALUES (?, ?)";
    $stmt = $db_obj->prepare($sql);
    $stmt-> bind_param("ss"
        , $uname, $pass);
    $uname = $_POST["username"];
    $pass = $_POST["password"];
    $mail = $_POST["useremail"];
    $stmt->execute();

    if ($stmt->execute()) { echo "New user created"; } else { echo "Error"; }
    $stmt->close(); $db_obj->close();
}
