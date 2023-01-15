<!--ist responsive-->
<?php

if (!isset($_SESSION)){
    session_start();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Impressum Vienna Palace</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
          crossorigin="anonymous">
    <link rel="stylesheet" href="../0design/my_design.css">
    <?php include '../0include/navbar.php';?>



    <style>

    </style>
</head>

<body>


    <p class="text_zentriert container my-5">
        <strong><u>Vienna Palace GmbH</u></strong>
        <br>
        Hotellerie <br>
        UID-Nr: ATU12345678 <br>
        FN: 00756a <br>
        FB-Gericht: Handelsgericht Wien <br>
        Sitz: 1220 Wien <br>
        Wagramerstraße 151, 1220, Wien, Österreich <br>
        <strong>Kontaktdaten: </strong><br>
        +43 6767029823  <br>
        +43 6767029822 (Fax)  <br>
        <a href="mailto:Vienna@palace.at">Vienna@palace.at</a> <br>
        Mitgliedschaften bei der Wirtschaftskammerorganisation: WKO <br>
        Anwendbare Rechtsvorschriften: Gewerbeordnung: <a href="https://www.ris.bka.gv.at/">www.ris.bka.gv.at </a> <br>
        Aufsichtsbehörde: Magistratisches Bezirksamt Donaustadt <br>
        Berufsbezeichnung: Hotelier <br>
        Verleihungsstaat: Österreich <br>
        Angaben zur Online-Streitbeilegung: Verbraucher haben die Möglichkeit,
        Beschwerden an die OnlineStreitbeilegungsplattform der EU zu
        richten: <a href="http://ec.europa.eu/odr">http://ec.europa.eu/odr </a>   <br>
        Sie können allfällige Beschwerde auch an
        die oben angegebene E-Mail-Adresse
        richten.

</p>
<!--    <div class=" impressum_pic">
        <img class="img-fluid" src="img/sheldon.jpg" alt="Hotel" width="400" height="300">
    </div>

    <div class="img-fluid impressum_pic">
        <img class="img-fluid" src="img/leonard.jpg" alt="Hotel" width="400" height="300">
    </div>
-->
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>


</html>