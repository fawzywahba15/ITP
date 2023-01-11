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

<?php if (isset($_SESSION["admin"] ) && $_SESSION["admin"]) : ?>
<body>




<div class="container ">

    <a class="nav-link dropdown-toggle button aussuch_btn" role="button" data-bs-toggle="dropdown" aria-expanded="false">

        <?php if(basename($_SERVER['PHP_SELF']) == 'admin.php')  : ?>
            Auswahl:
        <?php elseif(basename($_SERVER['PHP_SELF']) == 'show_all_user.php'): ?>
            Alle Benutzer:
        <?php elseif(basename($_SERVER['PHP_SELF']) == 'show_all_res.php'): ?>
            Alle reservierungen:
        <?php elseif(basename($_SERVER['PHP_SELF']) == 'show_user_res.php'): ?>

            <?php
                if (!isset($_POST["username"])){
                    $benutzer = $_SESSION["person_name"];
                    echo "Benutzer ' " . $benutzer ." ' reservierungen:";
                }else{

                $benutzer = $_POST["username"];
                echo "Benutzer ' " . $benutzer ." ' reservierungen:";

                }
            ?>
        <?php endif; ?>

    </a>
    <div class="text-left">
        <ul class="dropdown-menu ">
            <li><a class="dropdown-item" href="./show_all_user.php">Benutzer anzeigen</a></li>
            <li ><a class="dropdown-item" href="./show_all_res.php">Buchungen anzeigen</a></li>
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


