<?php




if(!isset($_SESSION))
{
    session_start();
}

if($_SESSION){
    session_destroy();
    header("refresh:0; url=logout.php");
}


if (!isset($_SESSION)) {
    session_start();
}

//todo vllt alles hier weg

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
          crossorigin="anonymous">
    <link rel="stylesheet" href="../0design/login.css">
    <?php include '../0include/navbar.php';?>
    <style>
        .button{
            margin-left: 7.5%;

        }
    </style>
</head>
<body>


<div class="container ms-0">
<h4 >
    Sie haben sich abgemeldet!
</h4>
<br>

<form action="../1.übung/main.php" >
    <button class="button">Zur Startseite</button>
</form>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
</html>