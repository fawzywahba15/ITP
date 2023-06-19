<?php
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
    <title>Sneaker Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
          crossorigin="anonymous">
    <link rel="stylesheet" href="../0design/my_design.css">
    <?php include '../0include/navbar.php';?>
</head>
<body>
<?php if (isset($_SESSION["username"] )) : ?>
<div class="container ">

    <a class="nav-link dropdown-toggle dropdown_btn" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <?php if(basename($_SERVER['PHP_SELF']) == 'bestellungen_main.php')  : ?>
        Auswahl:
        <?php elseif(basename($_SERVER['PHP_SELF']) == 'new_sales_anzeigen.php'): ?>
        Meine Bestellungen
        <?php else: ?>
        Warenkorb:
        <?php endif; ?>
    </a>

    <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="warenkorb.php">Warenkorb</a></li>
        <li ><a class="dropdown-item" href="./new_sales_anzeigen.php">Meine Bestellungen</a></li>
    </ul>

</div>

<?php else: ?>
    <div class="container"><h3>Bitte <a href="../login/login.php">anmelden</a> oder <a href="../2_übung/new_reg.php">registrieren</a> um etwas zu kaufen!</h3></div>

<?php endif; ?>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>

</html>


