<?php

if(!isset($_SESSION)) {
    session_start();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>


    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
          crossorigin="anonymous">
    <link rel="stylesheet" href="../0design/login.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <?php include '../0include/navbar.php'; ?>
    <style>
        .aussuch_btn{
            display: flex;
            width: min-content;
            padding: 20px;
            margin-bottom: 75px;
            margin-left: 50%;
            transform: translate(-50%, 50%);
            border: #2ecc71 2px solid;
            border-radius: 20px;
        }
    </style>
</head>

<!--falls man einen admin ist, dann wird die website angezeigt sonst -> error-->
<?php if (isset($_SESSION["admin"] ) && $_SESSION["admin"]) : ?>
<body>

<div class="container ">

    <a class="nav-link dropdown-toggle button aussuch_btn" role="button" data-bs-toggle="dropdown" aria-expanded="false">

<!--        drop down menüm auswahl-->
        <?php if(basename($_SERVER['PHP_SELF']) == 'admin.php')  : ?>
            Auswahl:
        <?php elseif(basename($_SERVER['PHP_SELF']) == 'show_all_user.php'): ?>
            Alle Benutzer:
        <?php elseif(basename($_SERVER['PHP_SELF']) == 'new_show_all_bestellungen.php'): ?>
            Alle Bestellungen:
        <?php elseif(basename($_SERVER['PHP_SELF']) == 'show_user_sales.php'): ?>

            <?php
                //falls man die res von einem bestimmten benutzer sehen will, dann soll der name ausgegeben werden
                if (!isset($_POST["username"])){
                    $benutzer = $_SESSION["person_name"];
                    echo "Benutzer ' " . $benutzer ." ' reservierungen:";
                }else{

                $benutzer = $_POST["username"];
                echo "Benutzer ' " . $benutzer ." ' reservierungen:";

                }
            ?>
        <?php elseif(basename($_SERVER['PHP_SELF']) == 'restock.php'): ?>
            Restock:

        <?php elseif(basename($_SERVER['PHP_SELF']) == 'add_new_article_to_DB.php'): ?>
            Artikel hinzufügen:
        <?php endif; ?>

    </a>
    <div class="text-left">
        <ul class="dropdown-menu ">
            <li><a class="dropdown-item" href="./show_all_user.php">Benutzer anzeigen</a></li>
            <li ><a class="dropdown-item" href="./new_show_all_bestellungen.php">Sales anzeigen</a></li>
            <li ><a class="dropdown-item" href="./add_new_article_to_DB.php">Artikel hinzufügen</a></li>
            <li ><a class="dropdown-item" href="./restock.php">Stock ändern</a></li>

        </ul>
    </div>
</div>







</body>


    <!--falls man kein admin ist-->
<?php else: ?>
<body>
<h1> Sie sind kein admin!</h1>
</body>
<?php endif; ?>


<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
    crossorigin="anonymous"></script>

</html>


