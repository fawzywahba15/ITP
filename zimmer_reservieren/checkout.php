<?php
if(!isset($_SESSION))
{
    session_start();
}
var_dump($_POST);

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
if (isset($_POST["Haustier"]) && $_POST["Haustier"] == "yes") {
    $new_preis += 20;
}

if (isset($_POST["Parkplatz"]) && $_POST["Parkplatz"] == "yes") {
    $new_preis += 36;
}

if (isset($_POST["breakfast"]) && $_POST["breakfast"] == "yes") {
    $new_preis += 10;
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
preis: <?php
if (isset($new_preis)){
echo $new_preis;
}
if ($_SERVER["REQUEST_METHOD"] == "post"){
    echo "ok";
}
?>
<button class="button_2" onclick="redirect()">check out!</button>
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




include_once "buchung_into_db.php";