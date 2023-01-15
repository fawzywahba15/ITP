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
    <title>Vienna Palace Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
          crossorigin="anonymous">
    <link rel="stylesheet" href="../0design/my_design.css">
    <?php include '../0include/navbar.php';?>


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

<!--hotel bild-->
<div class="text_zentriert">
    <img
    class="img-fluid"
    src="../0fusszeile/img/pertschy.jpg"
    alt="Hotel"
    width="800" height="500"></div>



<div class="container my-5 mx-3">
    <h4>Über uns:</h4>
Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab accusamus asperiores autem blanditiis consequuntur culpa cupiditate deserunt doloribus ducimus earum, eligendi est eveniet facere fugiat ipsam itaque laboriosam magnam maiores natus nemo odit officia omnis placeat possimus praesentium quam quasi repellat repellendus sapiente sed sequi sint sunt tempora tenetur ullam vel voluptates. Autem cumque doloremque numquam odio? Beatae corporis, debitis dicta eaque error est eveniet id impedit minus molestiae nam neque numquam odit omnis pariatur qui, quia, sed tempore tenetur!
</div>


<!--die 3 hotelkategorien mit bild-->
<div class="text_zentriert">
    <h3>Unsere Zimmer:</h3>
    <div class="text_zentriert">
        <ul>
            <li>
                <h6 class="my-3">Unsere Doppelzimmer:</h6>
                <img
                        class="img-fluid"
                        src="../0fusszeile/img/hotelzimmer.jpg"
                        alt="Doppelzimmer"
                        width="800" height="500">
            </li>


            <li>
                <h6 class="my-3">Unsere einzelzimmer</h6>
                <img
                        class="img-fluid"
                        src="../0fusszeile/img/einzelzimmer.jpg"
                        alt="einzelzimmer"
                        width="800" height="500">
            </li>


            <li>
                <h6 class="my-3">Unsere Familienzimmer</h6>
                <img
                        class="img-fluid"
                        src="../0fusszeile/img/familienzimmer.jpg"
                        alt="einzelzimmer"
                        width="800" height="500">
            </li>
        </ul>
</div>
</div>





</div>


<?php
include_once "../0include/footer.php"
?>



</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
         integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
         crossorigin="anonymous"></script>

</html>