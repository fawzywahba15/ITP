<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vienna Palace Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
          crossorigin="anonymous">
    <link rel="stylesheet" href="./0design/my_design.css">
    <?php include './0include/navbar.php';?>
    
</head>
<body>

<form action="#" method="post">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name">
    
    <label for="preis">Preis:</label>
    <input type="text" id="preis" name="preis">

    <label for="pfad">Pfad:</label>
    <input type="text" id="pfad" name="pfad">

    <label for="beschreibung">Beschreibung:</label>
    <input type="text" id="beschreibung" name="pfad">

    <button type="submit">add to db</button>

</form>


</body>
<?php
var_dump($_POST);
if (isset($_POST["name"])){
    // db connectiona
    include_once "./0include/dbaccess.php";
    $name = $_POST["name"];
    $preis = $_POST["preis"];
    $pfad = $_POST["pfad"];
    if (isset($_POST["beschreibung"])){
        $beschreibung = $_POST["beschreibung"];
    }else{
        $beschreibung = null;
    }
    if ($beschreibung == null){
        $sql = "insert into produkte (`name`, `preis`, `pfad`) values($name, $preis, $pfad)";
    }else{
        $sql = "insert into produkte (`name`, `preis`, `pfad`, `beschreibung`) values($name, $preis, $pfad, $beschreibung)";

    }
    $result = mysqli_query($db_obj, $sql);
    echo "Result:" . $result;
}?>
</html>


