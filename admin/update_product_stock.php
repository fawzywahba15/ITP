<?php
//update datenbank
$id = $_POST["id"];
$stock = $_POST["stock"];


include_once "../0include/dbaccess.php";
    // Connect to the database and update the data

    $sql = "UPDATE produkte SET `stock` = '$stock' WHERE id = '$id'";
    $result = mysqli_query($db_obj, $sql);

mysqli_close($db_obj);



?>

