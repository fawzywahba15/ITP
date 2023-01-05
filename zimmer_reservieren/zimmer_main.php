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
    <title>Vienna Palace Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
          crossorigin="anonymous">
    <link rel="stylesheet" href="../0design/my_design.css">
    <?php include '../0include/navbar.php';?>
    <style>
        .ka{
            display: flex;
            width: min-content;
            padding: 20px;
            margin-bottom: 75px;
            margin-left: 50%;
            transform: translate(-50%, 50%);
            border: #2ecc71 2px solid;
            border-radius: 20px;
        }
        .drop{
            margin-top: 200px;

        }
    </style>

</head>
<body>

<div class="container ">

    <a class="nav-link dropdown-toggle ka" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <?php if(basename($_SERVER['PHP_SELF']) == 'zimmer_main.php')  : ?>
        Auswahl:
        <?php elseif(basename($_SERVER['PHP_SELF']) == 'buchungen_anzeigen.php'): ?>
        Meine Buchungen
        <?php else: ?>
        Zimmer reservieren:
        <?php endif; ?>
    </a>

    <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="../zimmer_reservieren/buchen.php">Zimmer reservieren</a></li>
        <li ><a class="dropdown-item" href="../zimmer_reservieren/buchungen_anzeigen.php">Meine Buchungen</a></li>
    </ul>

</div>




</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>

</html>

