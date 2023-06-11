<?php

include_once "../0include/dbaccess.php";

if (isset($_POST['id'], $_POST['status'])) {
    $id = $_POST['id'];
    $status = $_POST['status'];

    $sql = "UPDATE bestellungen SET `status` = ? WHERE `id` = ?";
    $stmt = mysqli_prepare($db_obj, $sql);


    mysqli_stmt_bind_param($stmt, "si", $status, $id);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);

}

mysqli_close($db_obj);


?>