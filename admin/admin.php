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
</head>

<?php if (isset($_SESSION["admin"] ) && $_SESSION["admin"]) : ?>
<body>


<form method="post" action="show_all_user.php">
<button class="button"> Alle Benutzer anzeigen:</button>
</form>

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
    crossorigin="anonymous">

</script>

</html>


