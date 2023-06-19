<?php
//session start
if(!isset($_SESSION))
{
    session_start();
}
include_once "./admin.php";
include_once "../0include/popup.html";
?>


<body>


<form method="post" action="#" enctype="multipart/form-data">
    <label for="name" class="label_reg">Name:</label>
    <input type="text" id="name" name="name" class="input-block">

    <label for="preis" class="label_reg">Preis:</label>
    <input type="number" id="preis" name="preis" class="input-block">

    <label for="pfad" class="label_reg">Bild:</label>
    <input type="file" id="pfad" name="pfad" class="input-block input_wide">


    <label for="beschreibung" class="label_reg">Beschreibung:</label>
    <input type="text" id="beschreibung" name="beschreibung" class="input-block">

    <label for="stock" class="label_reg">Stock:</label>
    <input type="number" id="stock" name="stock" class="input-block">

    <button type="submit" class="button label_reg my-5">Hinzufügen</button>

</form>






</body>
<?php
if (isset($_POST["name"]) && $_POST["name"] != ""){
var_dump($_POST);
    $file = $_FILES['pfad'];
    $file_name = $file['name'];
    // db connection
    $base_dir = "../images/";
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
            showPopup('', 'Erfolgreich Hinzugefügt');
        </script>




<?php
    }else{
        echo "Result:" . $result;
    }
}

include_once "../0include/footer.php"
?>



</html>
