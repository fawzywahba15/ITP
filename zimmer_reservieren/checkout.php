<?php
if(!isset($_SESSION))
{
    session_start();
}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Checkout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
          crossorigin="anonymous">
    <link rel="stylesheet" href="../0design/my_design.css">
    <?php include '../0include/navbar.php';?>
</head>
<body>
<div class="container">
    <h1 class="text-center">checkout</h1>
    <div class="text-center">
<?php

$host = 'localhost';
$user = 'fawzy';
$password = 'mypassword';
$database = 'regestrieren';
$db_obj = new mysqli($host, $user, $password, $database);
$room_type = $_POST['room_type'];
$sql = "SELECT * from `zimmer`";
$result = mysqli_query($db_obj, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row["zimmer_kategorie"] == $room_type){
            $new_preis = $row["preis"];
        }
    }
}
/*var_dump($_POST);*/

$arrival = date_create_from_format("Y-m-d" ,$_POST["arrival_date"]);
$departure = date_create_from_format("Y-m-d" ,$_POST["departure_date"]);
$interval = $departure->diff($arrival);
$anzahl_nights = $interval->format("%d");
if ($anzahl_nights == 1){
    $nächtelabel = "Nacht";
}else{
    $nächtelabel = "Nächte";
}
$_POST["anzahl_nights"] = $anzahl_nights;

echo $new_preis . " * " . $anzahl_nights . " ".$nächtelabel . ": ";
$new_preis =$new_preis * $anzahl_nights;
echo $new_preis . "€";
echo "<br>";









if (isset($_POST["Haustier"]) && $_POST["Haustier"] == "yes") {
    $new_preis += 10 * $anzahl_nights;
    $haustier_kosten = 10 * $anzahl_nights;
    echo "Haustier " . $anzahl_nights. " " . $nächtelabel ." " . $haustier_kosten . "€";
    echo "<br>";
}

if (isset($_POST["Parkplatz"]) && $_POST["Parkplatz"] == "yes") {
    $new_preis += 36 * $anzahl_nights;
    $garage_kosten = 36 * $anzahl_nights;
    echo "Garage " . $anzahl_nights. " " . $nächtelabel ." " . $garage_kosten . "€";
    echo "<br>";
}

if (isset($_POST["breakfast"]) && $_POST["breakfast"] == "yes") {
    if ($_POST["room_type"] == "single room"){
        $new_preis += 10 * $anzahl_nights;
        echo "Frühstück " . $anzahl_nights. " " . $nächtelabel ." " . $new_preis . "€";
        echo "<br>";
    }else{
        $new_preis += 20 * $anzahl_nights;
        $breakfast_kosten = 20 * $anzahl_nights;
        echo "Frühstück " . $anzahl_nights. " ". "für 2 Personen " . $nächtelabel ." " . $breakfast_kosten . "€";
        echo "<br>";
    }
}



?>


Ihr aufenthalt über <?php echo $anzahl_nights . " " . $nächtelabel ?>  kostet: <?php echo $new_preis; ?>
        <br>
<button type="button" class="button_2 my-4" onclick="redirect()">bezahlen!</button>
    </div>
</div>

</body>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
<script>
    function redirect(){
        window.location.assign("./buchung_into_db.php");
    }
</script>
</html>
<?php
$_POST["gesamtpreis"] = $new_preis;
$_POST["anzahl_nights"] = $anzahl_nights;
$_SESSION['formData'] = $_POST;