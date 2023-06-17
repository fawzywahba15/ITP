<?php
//session start
if(!isset($_SESSION))
{
    session_start();
}

?>
<head>
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
<?php
include_once "./admin.php";
?>


<form method="post" action="#" enctype="multipart/form-data">
    <label for="name" class="text_zentriert_1">Name:</label>
    <input type="text" id="name" name="name" class="input">

    <label for="preis" class="text_zentriert_1">Preis:</label>
    <input type="number" id="preis" name="preis" class="input">

    <label for="pfad" class="text_zentriert_1">Bild:</label>
    <input type="file" id="pfad" name="pfad" class="input input_wide">


    <label for="beschreibung" class="text_zentriert_1">Beschreibung:</label>
    <input type="text" id="beschreibung" name="beschreibung" class="input">

    <label for="stock" class="text_zentriert_1">Stock:</label>
    <input type="number" id="stock" name="stock" class="input">

    <button type="submit" class="button text_zentriert_1">Hinzufügen</button>

</form>






</body>
<?php
if (isset($_POST["name"]) && $_POST["name"] != ""){
var_dump($_POST);
    $file = $_FILES['pfad'];
    $file_name = $file['name'];
    // db connection
    $base_dir = "../images/";
    $target_file = $base_dir . $file_name;
    include_once "../0include/dbaccess.php";
    $name = $_POST["name"];
    $stock = $_POST["stock"];
    $preis = $_POST["preis"];
    $pfad = $base_dir . $file_name;

    if (isset($_POST["beschreibung"])){
        $beschreibung = $_POST["beschreibung"];
    }else{
        $beschreibung = null;
    }
    if ($beschreibung == null){
        $sql = "insert into produkte (`name`, `preis`, `pfad`, `stock`) values('$name', '$preis', '$pfad', '$stock')";
    }else{
        $sql = "insert into produkte (`name`, `preis`, `pfad`, `beschreibung`, `stock`) values('$name', '$preis', '$pfad', '$beschreibung', '$stock')";

    }
    $result = mysqli_query($db_obj, $sql);
    echo "Result:" . $result;
    if ($result == 1){
        ?>
        <script>
            function erfolg_function(){
                window.alert("Erfolgreich Hinzugefügt!")
            }
            erfolg_function();
        </script>




<?php
    }else{
        echo "Result:" . $result;
    }
}
?>



</html>
