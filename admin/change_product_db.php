<?php

include_once "../0include/dbaccess.php";

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $preis = $_POST['preis'];
    $beschreibung = $_POST['beschreibung'];
    $stock = $_POST['stock'];


    $file = $_FILES['pfad'];
    $file_name = $file['name'];
    // db connection
    $base_dir = "../images/";
    $pfad = $base_dir . $file_name;

    $sql = "UPDATE produkte SET `name` = ?, `preis` = ?, `beschreibung` = ?, `pfad` = ?, `stock` =?  WHERE `id` = ?";

    $stmt = mysqli_prepare($db_obj, $sql);


    mysqli_stmt_bind_param($stmt, "sissii", $name, $preis, $beschreibung, $pfad, $id);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);

}

mysqli_close($db_obj);


?>