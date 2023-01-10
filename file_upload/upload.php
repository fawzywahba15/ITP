<?php

if(!isset($_SESSION))
{
    session_start();
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>File Upload</title>
    <link rel="stylesheet" href="../0design/my_design.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
          crossorigin="anonymous">
    <?php include '../0include/navbar.php'; ?>

    <style>
        ::placeholder{
            color: white;
        }
        .article_title_input{
            color: white;
            outline: none;
            background-color: #824caf;
            border: solid 3px #824caf;
            border-radius: 20px;
        }
        .article_title_input:focus{
            border: solid 3px #4CAF50;

        }
        .article_text_input{
            color: white;
            outline: none;
            background-color: #824caf;
            border: solid 3px #824caf;
            border-radius: 20px;
            width: 700px;
            height: 400px;
        }
        .article_text_input:focus{
            border: solid 3px #4CAF50;
        }
        .form-control-lg{
            background-color: #824caf;
            color: white;
            outline: none;
            border: #824caf 1px solid;
        }

        .form-control-lg:hover{
            background-color: #2ecc71;
            color: white;
            outline: none;

        }
        .form-control-lg:focus{
            background-color: #824caf;
            color: white;
            outline: none;

        }

        .button{
            background-color: #824caf;
            border-color: #824caf;
        }
        .button:hover{
            background-color: black;
            border-color: #824caf;
        }
        .alert{
            width: 400px;
            margin-left: 50%;
            margin-top: 50px;
            margin-bottom: 0;
            text-align: center;
            transform: translate(-50%, -50%);
        }

    </style>

</head>
<body>
<?php

if (isset($php_file_upload_error) && $_FILES["userfile"]["error"] != 0){
    ?>
    <div class="alert alert-danger"> <?php
        echo $php_file_upload_error[$_FILES["userfile"]["error"]];
        ?>
    </div> <?php
}
elseif (isset($extensions_error) && $extensions_error == True){
    ?>
    <div class="alert alert-danger"> <?php
    echo "falscher Datentyp"; ?>
    </div><?php

}elseif (isset($pop_up_erfolg) && $pop_up_erfolg){
?>
<div class="alert alert-success"> <?php
    echo "bild erfolgreich hochgeladen";
    }
    ?></div>


<h2 class="text_zentriert">Bitte laden sie Ihr Bild hoch:</h2>
<form action="./artikel_to_db.php" method="post" enctype="multipart/form-data">
    <div class="container">
        <input class="form-control form-control-lg" id="formFileLg" name="userfile" type="file">
        <br>
        <div class="text-center">
            <label for="title">Title:</label><br>
            <input type="text" id="title" name="title" class="article_title_input" placeholder="Titel hier eingeben:"><br>
            <br>
            <label for="text">Text:</label><br>
            <textarea id="text" name="text" class="article_text_input" placeholder="Text hier eingeben:"></textarea>
            <br><br>
            <input type="submit" value="upload"  class="button my-4" >
            </div>

    </div>


</form>


</body>

<?php
include_once "../0include/footer.php"
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
</html>