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

if (isset($_FILES["userfile"])){

    $php_file_upload_error = array(
        0 => "Datei erfolgreich hochgelande",
        1 => "Datei größe überschreitet die maximal erlaubte Dateigröße",
        2 => "Datei größe überschreitet die maximal erlaubte Dateigröße",
        3 => "Datei nur teilweise hochgeladen",
        4 => "Datei wurde nicht hochgeladen",
        5 => "Es ist ein fehler aufgetreten bitte versuchen sie es nochmal",
        6 => "Es ist ein fehler aufgetreten bitte versuchen sie es nochmal",
        7 => "Es ist ein fehler aufgetreten bitte versuchen sie es nochmal",
        8 => "Es ist ein fehler aufgetreten bitte versuchen sie es nochmal",
    );


    $extensions_error = false;
    $extensions = array("gif", "jpeg", "png", "jpg");
    $file_extension = explode(".", $_FILES["userfile"]["name"]);
    $file_extension = end($file_extension);
    if (!in_array($file_extension ,$extensions)){
        !$extensions_error = true;
    }



    if ($_FILES["userfile"]["error"]){
        ?>
        <div class="alert alert-danger"> <?php
            echo $php_file_upload_error[$_FILES["userfile"]["error"]];
            ?>
        </div> <?php
    }
    elseif ($extensions_error){
        ?>
        <div class="alert alert-danger"> <?php
        echo "falscher Datentyp"; ?>
        </div><?php

    }else{
        ?>
        <div class="alert alert-success"> <?php
            echo "bild erfolgreich hochgeladen";

            ?></div> <?php
        $jetziges_id = uniqid();
        $upload= move_uploaded_file($_FILES["userfile"]["tmp_name"], "news_beiträge/" .  $jetziges_id .".".$file_extension);
        $picture_path = "news_beiträge/" . $jetziges_id ."." . $file_extension;
        if ($file_extension == "png"){
            $original_img = imagecreatefrompng($picture_path);
        }elseif ($file_extension == "jpeg") {
            $original_img = imagecreatefromjpeg($picture_path);
        }elseif ($file_extension == "gif") {
            $original_img = imagecreatefromgif($picture_path);
        }elseif ($file_extension == "jpg") {
            $original_img = imagecreatefromjpeg($picture_path);
        }



        $width = imagesx($original_img);
        $height = imagesy($original_img);

        $thumb_width = 720;
        $thumb_height = 480;
        $thumbnail = imagecreatetruecolor($thumb_width, $thumb_height);
        imagecopyresampled($thumbnail, $original_img, 0, 0, 0, 0,$thumb_width, $thumb_height, $width, $height );

        imagejpeg($thumbnail,"thumbnails/"."resized_". $jetziges_id . "." . $file_extension);



    }

}

?>

<h2 class="text_zentriert">Bitte laden sie Ihr Bild hoch:</h2>
<form action="" method="post" enctype="multipart/form-data">
    <!--    <input type="file" name="userfile"  class="button_2">
        <input type="submit" value="upload"  class="button" >-->
    <div class="container">
        <input class="form-control form-control-lg" id="formFileLg" name="userfile" type="file">
        <input type="submit" value="upload"  class="button my-4" >
    </div>


</form>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
</html>