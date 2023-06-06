<?php
//session start
if(!isset($_SESSION))
{
    session_start();
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produkt hinzufügen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
          crossorigin="anonymous">
    <link rel="stylesheet" href="../0design/my_design.css">
    <?php include '../0include/navbar.php';?>

</head>
<body>


<form method="post" action="#" enctype="multipart/form-data">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name">

    <label for="preis">Preis:</label>
    <input type="number" id="preis" name="preis">

    <label for="pfad">Pfad:</label>
    <input type="file" id="pfad" name="pfad">

    <label for="beschreibung">Beschreibung:</label>
    <input type="text" id="beschreibung" name="beschreibung">

    <button type="submit">Hinzufügen</button>

</form>






</body>
<?php
if (isset($_POST["name"]) && $_POST["name"] != ""){
var_dump($_POST);
    $file = $_FILES['pfad'];
    $file_name = $file['name'];
    // db connection
    $base_dir = "../zzz/images/";
    $target_file = $base_dir . $file_name;
    include_once "../0include/dbaccess.php";
    $name = $_POST["name"];
    $preis = $_POST["preis"];
    $pfad = $base_dir . $file_name;

    if (isset($_POST["beschreibung"])){
        $beschreibung = $_POST["beschreibung"];
    }else{
        $beschreibung = null;
    }
    if ($beschreibung == null){
        $sql = "insert into produkte (`name`, `preis`, `pfad`) values('$name', '$preis', '$pfad')";
    }else{
        $sql = "insert into produkte (`name`, `preis`, `pfad`, `beschreibung`) values('$name', '$preis', '$pfad', '$beschreibung')";

    }
    $result = mysqli_query($db_obj, $sql);
    echo "Result:" . $result;
}
?>
</html>
