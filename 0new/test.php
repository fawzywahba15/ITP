<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drop your ship</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
          crossorigin="anonymous">
    <link rel="stylesheet" href="../0design/my_design.css">
    <?php include '../0include/navbar.php';?>


</head>
<body>

<?php
$person_fk = 47;
$produkt_1 = 1;
$produkt_2 = 2;
include "../0include/dbaccess.php";
$sql = "INSERT INTO `bestellung_erstellen` (`person_fk`,`produkt_1`, `produkt_2`) VALUES ('$person_fk', '$produkt_1', '$produkt_2')";
$stmt = $db_obj->prepare($sql);
$stmt->execute();

$sql_2 = "INSERT INTO `bestellungen` (`person_fk`, `bestellung_erstellen_fk`) VALUES ('$person_fk', LAST_INSERT_ID())";
$stmt_2 = $db_obj->prepare($sql_2);
$stmt_2->execute();
?>

</body>
</html>