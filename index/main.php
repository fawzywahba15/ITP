<!--ist responsive-->
<?php
//session start
if(!isset($_SESSION))
{
    session_start();
}

?>
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
    <?php include '../0include/navbar.php';?>
    <link rel="stylesheet" href="../0design/my_design.css">

</head>






<body>


<div class="container">




<h5 class="my-5">
    <?php
    //holt das SESSION SUPERGLOBAL und begrüßt den angemeldeten user mit nachnamen
    if (isset($_SESSION["username"] )) {
        echo "Welcome back " .  $_SESSION["username"]  . "!";
    }
    else{
        echo "";
    }
    ?>
</h5>



    <div class="container d-flex justify-content-center mt-50 mb-50">
        <div class="row">
            <?php
            include_once "../0include/popup.html";
            include "../0include/dbaccess.php";

            $sql = "SELECT * FROM produkte";
            $result = mysqli_query($db_obj, $sql);
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {

                    ?>

            <div class="col-md-4 mt-2">
                <div class="card">
                    <div class="card-body">
                        <div class="card-img-actions">

                            <img src='<?php echo $row["pfad"]?>' id='<?php echo $row["id"]?>' class="card-img img-fluid" width="96" height="350" alt="">

                        </div>
                    </div>

                    <div class="card-body card-lower text-center">
                        <div class="mb-2">

                            <h4 class="font-weight-semibold mb-2">
                                <?php echo $row["name"]?>
                            </h4>
                        </div>

                        <h5 class="mb-0 font-weight-semibold text-black"><?php echo "€" . $row["preis"]?></h5>


                        <div class="mb-3 schwarz">Beschreibung: <?php echo $row["beschreibung"]?></div>
                        <br>
                    <?php if ($row["stock"] > 1) : ?>

                        <button type="button" onclick="add_to_cart(<?php echo $row['id']?> , <?php echo $row['preis']?>, '<?php echo $row['name']?>')" class="btn bg-cart"><i class="fa fa-cart-plus mr-2"></i> Add to cart</button>
                    <?php else: ?>
                        <button type="button" onclick="sold_out_error()" class="btn btn-danger"><i class="fa fa-cart-plus mr-2"></i> Sold out!</button>

                    <?php endif; ?>



                    </div>
                </div>
            </div>
<?php
                }
            }
?>




    </div>






</body>
<br>
<!--todo hier einfügen-->
<?php
/*include_once "../0include/footer.php"
*/?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
         integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
         crossorigin="anonymous"></script>

<script>
    function add_to_cart(id, preis, produkt_name) {
        <?php if (isset($_SESSION["username"] )) : ?>
        var xhttp = new XMLHttpRequest();
        var url = "../bestellungen/artikel_into_warenkorb.php";
        xhttp.open("POST", url, true);
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4) {
                if (this.status == 200) {
                    // Request was successful
                    showPopup('', 'Ihr Artikel wurde erfolgreich dem Warenkorb hinzugefügt!');
                } else {
                    // Error handling
                    showPopup('', 'Leider ist ein fehler aufgetreten!');

                }
            }
        };

        xhttp.send("produkt_id=" + id + "&produkt_name=" + encodeURIComponent(produkt_name) + "&produkt_preis=" + encodeURIComponent(preis));

        <?php else: ?>
        showPopup('Fehlermeldung', 'Sie sind nicht angemeldet!');

    <?php endif; ?>
    }

    function sold_out_error(){
        showPopup('Sold out!', 'This article is sold out!')
    }




</script>

</html>