<?php
include "../0include/dbaccess.php";

$user_id = $_POST["person_id"];
$produkt_id = $_POST["button_id"];
$sql = "DELETE FROM warenkorb WHERE `fk_person_id` = ? AND `fk_produkt_id` = ?";
$stmt = mysqli_prepare($db_obj, $sql);
mysqli_stmt_bind_param($stmt, "ii", $user_id, $produkt_id);
mysqli_stmt_execute($stmt);
$result = mysqli_query($db_obj, $sql);

?>