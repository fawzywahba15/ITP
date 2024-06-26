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
var_dump($produkt_preise);

$gesamtpreis = 0;
for ($p=0; $p < count($produkt_preise); $p++){
    $gesamtpreis += $produkt_preise[$p];
}

echo "Gesamtpreis: " . $gesamtpreis;

if (empty($user_id) || empty($produkt_ids) || empty($produkt_names) || empty($produkt_preise) || empty($email)) {
    $error = "Error: All fields are required.";
} else {
    $success = "Buchung erfolgreich!";
    include "../0include/dbaccess.php";

    // Prepare the SQL statement
    $sql = "INSERT INTO `verkaufte_produkte` (`usermail`, `fk_person_id`, `fk_produkt_id`, `produkt_name`, `produkt_preis`, `timestamp`) VALUES (?, ?, ?, ?, ?, current_timestamp)";
    $stmt = $db_obj->prepare($sql);


    // Prepare the SQL statement to decrement stock
    $decrementStockSql = "UPDATE produkte SET stock = stock - 1 WHERE id = ?";
    $decrementStockStmt = $db_obj->prepare($decrementStockSql);

    // Bind parameters and execute the query for each entry
    for ($i = 0; $i < count($produkt_ids); $i++) {
        $stmt->bind_param("siisi", $email, $user_id, $produkt_ids[$i], $produkt_names[$i], $produkt_preise[$i]);
        if (!$stmt->execute()) {
            echo "Error";
            break;
        } else {
            // Decrement stock for the current product
            $decrementStockStmt->bind_param("i", $produkt_ids[$i]);
            $decrementStockStmt->execute();

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

<?php
$productIds = $produkt_ids;
$placeholders = array();
$values = array($user_id);

include "../0include/dbaccess.php";

for ($i = 0; $i < count($productIds); $i++) {
    $placeholders[] = "`produkt_" . ($i + 1) . "`";
    $values[] = $productIds[$i];

}

$placeholderString = implode(", ", $placeholders);
$placeholderParams = rtrim(str_repeat("?, ", count($values)), ", ");


$ka = str_repeat("s", count(($values)) );

$sql_3 = "INSERT INTO `bestellung_erstellen` (`person_fk`, $placeholderString) VALUES ($placeholderParams)";
$stmt_3 = $db_obj->prepare($sql_3);
$stmt_3->bind_param(str_repeat("s", count(($values)) ), ...$values);

if ($stmt_3->execute()) {
    echo "Insertion successful!";
} else {
    echo "Insertion failed: " . $stmt_3->error;
}
/*$sql = "INSERT INTO `bestellung_erstellen` (`person_fk`,`produkt_1`, `produkt_2`) VALUES ('$user_id', '$produkt_1', '$produkt_2')";
$stmt = $db_obj->prepare($sql);
$stmt->execute();*/

$sql_2 = "INSERT INTO `bestellungen` (`person_fk`, `bestellung_erstellen_fk`, `preis`) VALUES ('$user_id', LAST_INSERT_ID(), '$gesamtpreis')";
$stmt_2 = $db_obj->prepare($sql_2);
$stmt_2->execute();
?>
</body>
</html>
