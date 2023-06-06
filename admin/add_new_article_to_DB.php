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
    <style>
        .text_zentriert_1{
            margin-left: 50%;
            transform: translate(-50%,0);
        }
        .input{
            width: 200px;
            height: 50px;
        }
        .input:focus{
            width: 220px;
        }
        .input_wide{
            width: 300px;
        }
        .input_wide:focus{
            width: 330px;
        }
    </style>
</head>
<body>


<form method="post" action="#" enctype="multipart/form-data">
    <label for="name" class="text_zentriert_1">Name:</label>
    <input type="text" id="name" name="name" class="input">

    <label for="preis" class="text_zentriert_1">Preis:</label>
    <input type="number" id="preis" name="preis" class="input">

    <label for="pfad" class="text_zentriert_1">Bild:</label>
    <input type="file" id="pfad" name="pfad" class="input input_wide">


    <label for="beschreibung" class="text_zentriert_1">Beschreibung:</label>
    <input type="text" id="beschreibung" name="beschreibung" class="input">

    <button type="submit" class="button text_zentriert_1">Hinzufügen</button>

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
