<?php
if (!isset($_SESSION)) {
    session_start();
}

var_dump($_POST);
$user_id = $_SESSION['user_id'];
$produkt_ids = $_POST['product_id'];
$produkt_names = $_POST["product_name"];
$produkt_preise = $_POST["product_price"];
$email = strtolower($_SESSION['email']);

if (empty($user_id) || empty($produkt_ids) || empty($produkt_names) || empty($produkt_preise) || empty($email)) {
    $error = "Error: All fields are required.";
} else {
    $success = "Buchung erfolgreich!";
    include "../0include/dbaccess.php";

    // Prepare the SQL statement
    $sql = "INSERT INTO `verkaufte_produkte` (`usermail`, `fk_person_id`, `fk_produkt_id`, `produkt_name`, `produkt_preis`, `timestamp`) VALUES (?, ?, ?, ?, ?, current_timestamp)";
    $stmt = $db_obj->prepare($sql);

    // Bind parameters and execute the query for each entry
    for ($i = 0; $i < count($produkt_ids); $i++) {
        $stmt->bind_param("siisi", $email, $user_id, $produkt_ids[$i], $produkt_names[$i], $produkt_preise[$i]);
        if (!$stmt->execute()) {
            echo "Error";
            break;
        }else{
            include_once "bestellung_erfolg.php";
            //von warenkorb löschen
            $sql_2 = "DELETE FROM warenkorb WHERE `fk_produkt_id` = ? AND `fk_person_id` = ?";
            $stmt_2 = $db_obj->prepare($sql_2);
            $stmt_2->bind_param("ii", $produkt_ids[$i], $user_id);
            $stmt_2->execute();
            $stmt_2->close();
        }
    }

    $stmt->close();
    $db_obj->close();
}
?>
