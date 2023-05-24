<?php
if(!isset($_SESSION))
{
    session_start();
}
var_dump($_POST);

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

        .order-summary {
            width: 50%;
            margin: 20px 0;

        }

        .product {
            display: flex;
            justify-content: space-between;

            margin-left: 50%;
            transform: translate(50%, 0%);
            margin-bottom: 10px;
        }

        .product-name {
            text-align: right;
        }

    </style>
</head>
<body>
<div class="container">

    <div class="text-center">
<?php

//mit der db verbinden und zimmerpreise holen
include "../0include/dbaccess.php";

$preis = 0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productNames = $_POST["product_name"];
    $productPrices = $_POST["product_price"];

    // Output the product names with their prices
    echo "<h1>Order Summary</h1>";

    echo "<div class='order-summary'>";
    for ($i = 0; $i < count($productNames); $i++) {
        $productName = $productNames[$i];
        $productPrice = $productPrices[$i];
        echo "<div class='product'>";
        echo "<span class='product-name'>$productName</span>";
        echo "<span class='product-price'>$productPrice</span>";
        echo "</div>";
        $preis += $productPrice;
    }
    echo "</div>";

}
?>
        <hr>
        <h4>Gesamtpreis: <?php echo $preis?></h4>
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
        //todo bestellung logik implementieren
        window.location.assign("./bestellung_into_db.php");
    }
</script>
</html>
