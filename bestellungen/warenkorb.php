<?php
include "bestellungen_main.php";
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sale</title>

    <style>
        .button_2{
            width: 200px;
            height: 50px;
            margin-left: 50%;
            transform: translate(-50%,+50%);
            margin-bottom: 100px;
        }
    </style>
</head>
<body class="block">



<?php

$error = "";
$success ="";

?>
<div class="container block justify-content-center mt-50 mb-50">
    <div class="row">
        <?php
        include "../0include/dbaccess.php";
        $user_id = $_SESSION["user_id"];
        $sql = "SELECT * FROM warenkorb where `fk_person_id` = '$user_id'";
        $result = mysqli_query($db_obj, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $produkt_id = $row["fk_produkt_id"];
                $second_sql = "SELECT * FROM produkte where `id` = '$produkt_id'";
                $second_result = mysqli_query($db_obj, $second_sql);

                if (mysqli_num_rows($second_result) > 0) {
                    $second_row = mysqli_fetch_assoc($second_result);
                    //todo design ändern von den cards, ein produkt in einem table row

                    ?>
                    <div class="col-md-4 mt-2">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-img-actions">
                                    <img src='<?php echo $second_row["pfad"] ?>' id='<?php echo $second_row["id"] ?>' class="card-img img-fluid" width="96" height="350" alt="">
                                </div>
                            </div>


                            <div class="card-body bg-light text-center">
                                <div class="mb-2">
                                    <h6 class="font-weight-semibold mb-2">
                                        <a href="#" class="text-default mb-2" data-abc="true"><?php echo $second_row["name"] ?></a>
                                    </h6>
                                </div>
                                <div class="text-center">
                                    <h3 class="mb-0 font-weight-semibold text-black"><?php echo "€" . $second_row["preis"] ?></h3>
                                    <form action="#">
                                        <button onclick="delete_from_warenkorb(this, <?php echo $user_id?>)" id="<?php echo $second_row["id"] ?>" class="btn btn-danger my-2">Löschen</button>
                                        <!--<input type="hidden" name="pic_id" id='<?php /*echo $second_row["id"] */?>'>-->

                                    </form>

                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="product_name[]" value="<?php echo $second_row["name"]; ?>">
                        <input type="hidden" name="product_price[]" value="<?php echo $second_row["preis"]; ?>">
                        <input type="hidden" name="product_id[]" value="<?php echo $second_row["id"]; ?>">
                    </div>
                    <?php
                }
            }
        }else{
            echo "<p class='res_error'>Du hast noch nichts zum Warenkorb hinzugefügt</p>";
        }
        ?>
    </div>

    <form action="./checkout.php" method="post">
        <?php
        // Reset the mysqli_data_seek to rewind the result set
        $show_bestellung_aufgeben_button = 0;
        mysqli_data_seek($result, 0);
        while ($row = mysqli_fetch_assoc($result)) {
            $produkt_id = $row["fk_produkt_id"];
            $second_sql = "SELECT * FROM produkte where `id` = '$produkt_id'";
            $second_result = mysqli_query($db_obj, $second_sql);

            if (mysqli_num_rows($second_result) > 0) {
                $show_bestellung_aufgeben_button = 1;
                $second_row = mysqli_fetch_assoc($second_result);
                ?>
                <input type="hidden" name="product_name[]" value="<?php echo $second_row["name"]; ?>">
                <input type="hidden" name="product_price[]" value="<?php echo $second_row["preis"]; ?>">
                <input type="hidden" name="product_id[]" value="<?php echo $second_row["id"]; ?>">

                <?php
            }
        }
        if ($show_bestellung_aufgeben_button) {
            echo "<input type='submit' class='button_2' value='Bestellung aufgeben!'>";

        }
        ?>




    </form>
</div>


</body>


<br>
<?php
echo "<div class='block'>";
include_once "../0include/footer.php";
include_once "../0include/popup.html";

echo "<div>";
?>


<script>
    function delete_from_warenkorb(button) {
        event.preventDefault();
        var button_id = button.id;
        var person_id = <?php echo $user_id ?>;

        var xhttp = new XMLHttpRequest();
        var url = "delete_from_warenkorb.php";
        xhttp.open("POST", url, true);
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4) {
                if (this.status == 200) {
                    showPopup('', 'Vom Warenkorb gelöscht!');
                } else {
                    showPopup('', 'Etwas ist schief gelaufen!');
                }
            }
        };
        xhttp.send("button_id=" + button_id + "&person_id=" + person_id);
    }

</script>

</html>