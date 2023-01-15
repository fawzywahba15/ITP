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
    <style>
        .kosten_label{
            display: inline-block;
        }
        .kosten_label_2{
            display: inline-block;
            margin-left: 50%;
        }
        .kosten_label_breakfast{
            display: inline-block;
            margin-left: 26%;
        }
        .kosten_label_gesamt{
            display: inline-block;
            margin-left: 23%;
        }
    </style>
</head>
<body>
<div class="container">
    <h1 class="text-center">checkout</h1>
    <div class="text-center">
<?php

//mit der db verbinden und zimmerpreise holen
include "../0include/dbaccess.php";
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

//anzahl der nächte berechnen
$arrival = date_create_from_format("Y-m-d" ,$_POST["arrival_date"]);
$departure = date_create_from_format("Y-m-d" ,$_POST["departure_date"]);
$interval = $departure->diff($arrival);
$anzahl_nights = $interval->format("%d");

//wenn es eine nacht ist dann soll es nacht ausgeben sonst nächte
if ($anzahl_nights == 1){
    $nächtelabel = "Nacht";
}else{
    $nächtelabel = "Nächte";
}
//als post variable speichern um dann in der db einzuspeichern
$_POST["anzahl_nights"] = $anzahl_nights;

// ausgeben wieviel euro die übernachtungen alleine kosten
echo "<h1 class='kosten_label'>";
echo $new_preis . " * " . $anzahl_nights . " ".$nächtelabel . ": ";
echo "</h1>";
$new_preis =$new_preis * $anzahl_nights;
echo "<h1 class='kosten_label_2'>";
echo $new_preis . "€";
echo "</h1>";
echo "<br>";



//wenn es haustier gibt, dann berechnen wieviel es extra kosten würde
if (isset($_POST["Haustier"]) && $_POST["Haustier"] == "yes") {
    $new_preis += 10 * $anzahl_nights;
    $haustier_kosten = 10 * $anzahl_nights;
    echo "<h1 class='kosten_label'>";
    echo "Haustier " . $anzahl_nights. " " . $nächtelabel;
    echo "</h1>";
    echo "<h1 class='kosten_label_2'>";
    echo " " . $haustier_kosten . "€";
    echo "</h1>";
    echo "<br>";
}

//wenn es Parkplatz gibt, dann berechnen wieviel es extra kosten würde
if (isset($_POST["Parkplatz"]) && $_POST["Parkplatz"] == "yes") {
    $new_preis += 36 * $anzahl_nights;
    $garage_kosten = 36 * $anzahl_nights;
    echo "<h1 class='kosten_label'>";
    echo "Garage " . $anzahl_nights. " " . $nächtelabel ." " ;
    echo "</h1>";

    echo "<h1 class='kosten_label_2'>";
    echo  " " . $garage_kosten . "€";
    echo "</h1>";
    echo "<br>";
}

//wenn es frühstück gibt, dann berechnen wieviel es extra kosten würde
if (isset($_POST["breakfast"]) && $_POST["breakfast"] == "yes") {
    //wenn es single room ist, dann für eine person berechnen
    if ($_POST["room_type"] == "single room"){
        $new_preis += 10 * $anzahl_nights;
        echo "<h1 class='kosten_label'>";
        echo "Frühstück " . $anzahl_nights. " " . $nächtelabel;
        echo "</h1>";
        echo "<h1 class='kosten_label_2'>";
        echo  " " . $new_preis . "€";
        echo "</h1>";
        echo "<br>";
    }else{
        //sonst für 2 personen
        $new_preis += 20 * $anzahl_nights;
        $breakfast_kosten = 20 * $anzahl_nights;
        echo "<h1 class='kosten_label'>";
        echo "Frühstück " . "für 2 Personen " . $anzahl_nights. " " . $nächtelabel;
        echo "</h1>";
        echo "<h1 class='kosten_label_breakfast'>";
        echo " " . $breakfast_kosten . "€";
        echo "</h1>";
        echo "<br>";
    }
}



?>


 <?php
 //ausgeben wieviel alles insgeasmt kosten würde
        echo "<hr>";
        echo "<h1 class='kosten_label'>";
        echo "Ihr aufenthalt über ";
        echo $anzahl_nights . " " . $nächtelabel;
        echo " kostet:";
        echo "</h1>";

        echo "<h1 class='kosten_label_gesamt'>";
        echo $new_preis . "€";
        echo "</h1>";
        echo "<br>";
 ?>
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