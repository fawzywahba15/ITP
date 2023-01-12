<?php

if(!isset($_SESSION))
{
    session_start();
}
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



    if ($_FILES["userfile"]["error"]) {
        echo "";
    }
    elseif ($extensions_error){
        echo "";

    }else{

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
        $final_resized_path = "thumbnails/"."resized_". $jetziges_id . "." . $file_extension;
        $pop_up_erfolg = True;


//----------------------------------------------------------------------------------------------------------------
        // Connect to the database
        $host = "localhost";
        $user = "fawzy";
        $password = "mypassword";
        $dbname = "regestrieren";

        $conn = mysqli_connect($host, $user, $password, $dbname);

// Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

// Get the values of the title and text inputs
        $title = $_POST['title'];
        $text = $_POST['text'];
        $fk_admin_id =   $_SESSION["user_id"];

// Insert the article into the database
        if (isset($final_resized_path)){
            $sql = "INSERT INTO `news_beiträge` (title, `text`, `timestamp`, file_path,fk_admin_id) 
                VALUES ('$title', '$text', current_timestamp, '$final_resized_path','$fk_admin_id')";
        }else{
            $sql = "INSERT INTO `news_beiträge` (title, `text`, `timestamp`,fk_admin_id) 
                VALUES ('$title', '$text', current_timestamp,'$fk_admin_id')";

        }

        mysqli_query($conn, $sql);


// Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        /*include_once "news_beiträge.php";*/


    }

}




include_once "upload.php";







