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
    <title>Sneaker Store</title>

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
        <li class="li">Bieten Sie kostenlosen Versand an?</li>
        <div class="myclass">Ja, wir bieten kostenlosen Versand für alle Bestellungen an.</div>

        <li class="li">Was ist Ihre Rückgaberegelung?</li>
        <div class="myclass">Wir akzeptieren Rücksendungen innerhalb von 30 Tagen ab dem Kaufdatum. Die Artikel müssen ungetragen und in der Originalverpackung sein.</div>

        <li class="li">Welche Zahlungsmethoden akzeptieren Sie?</li>
        <div class="myclass">Wir akzeptieren Kreditkarten (Visa, Mastercard, American Express) sowie Zahlungen über PayPal.</div>

        <li class="li">Bieten Sie internationale Lieferung an?</li>
        <div class="myclass">Ja, wir liefern weltweit. Die Versandkosten können je nach Zielland variieren.</div>

        <li class="li">Gibt es eine Größentabelle für die Schuhe?</li>
        <div class="myclass">Ja, wir stellen eine Größentabelle zur Verfügung, um Ihnen bei der Auswahl der richtigen Größe zu helfen. Sie finden sie auf jeder Produktseite.</div>

        <li class="li">Können Schuhe umgetauscht werden, wenn sie nicht passen?</li>
        <div class="myclass">Ja, falls die bestellten Schuhe nicht passen, können Sie diese innerhalb von 30 Tagen gegen eine andere Größe umtauschen. Die Rücksendekosten werden jedoch vom Kunden getragen.</div>

        <li class="li">Bieten Sie limitierte Editionen oder exklusive Sneaker an?</li>
        <div class="myclass">Ja, wir haben regelmäßig limitierte Editionen und exklusive Sneaker im Sortiment. Schauen Sie regelmäßig auf unserer Website vorbei, um die neuesten Modelle zu entdecken.</div>

        <li class="li">Sind Ihre Schuhe authentisch?</li>
        <div class="myclass">Ja, wir garantieren, dass alle unsere Schuhe 100% authentisch sind. Wir beziehen sie direkt von den Herstellern und autorisierten Händlern.</div>

        <li class="li">Bieten Sie Rabatte für Stammkunden an?</li>
        <div class="myclass">Ja, wir bieten ein Treueprogramm an, bei dem Stammkunden exklusive Rabatte und Sonderangebote erhalten. Melden Sie sich für unseren Newsletter an, um über diese Vorteile informiert zu werden.</div>
    </ul>

</div>


</body>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
</html>