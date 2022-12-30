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
    <title>Vienna Palace Hotel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
          crossorigin="anonymous">

    <link rel="stylesheet" href="../0design/my_design.css">
    <?php include '../0include/navbar.php';?>
    <style>
        .myclass{
            margin-bottom: 30px;
        }
    </style>
</head>

<body>
    <div class="container mx-5">

        <ul>
            <li class="li"> Gibt es bei Ihnen Parkplätze?</li>
                <div class="myclass">Ja, die sind Gratis für unsere Kunden.</div>

            <li class="li">Gibt es bei Ihnen ein Zimmer für 6 Personen?</li>
                <div class="myclass">Ja, unser suites können bis zu 8 Personen unterbringen.</div>

            <li  class="li">Haben sie Doppelzimmer mit 2 Betten?</li>
                <div class="myclass">ja.</div>

            <li  class="li">Kann man ein Hund mitnehmen?</li>
                <div class="myclass">Ja, gegen eine Gebühr von 10€ pro Nacht.</div>

            <li  class="li">Gibt es bei Ihnen eine Bar?</li>
                <div class="myclass"> Nein leider nicht, jedoch steht in jedem Zimmer eine Minibar zur Verfügung.</div>

            <li  class="li">Gibt es Internet bei Ihnen?</li>
                <div class="myclass">Ja, wir haben kostenloses W-lan im gesamten Hotel</div>

            <li  class="li">Gibt es Einschränkungen im Hotel aufgrund Covid-19?</li>
                <div class="myclass">Nein der Hotelbetrieb läuft momentan uneingeschränkt.</div>

            <li  class="li">Ist das Leitungswasser in den Zimmern trinkbar?</li>
            <div class="myclass">Ja, außerdem ist das Leitungswasser in ganz Österreich von höchste Qualität!</div>

            <li  class="li">Haben sie Klimaanlagen im Hotel??</li>
            <div class="myclass">Ja, in jedem Zimmer ist eine funktionsfähige Klimaanlage inkludiert.</div>
        </ul>


    </div>

</body>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
</html>