<?php

include_once "../0include/dbaccess.php";

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $status = $_POST["status"];
    $sql = "UPDATE bestellung SET `status` = '$status' WHERE id = '$id'";

    $result = mysqli_query($db_obj, $sql);

}

mysqli_close($db_obj);

?>