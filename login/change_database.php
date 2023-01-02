<?php

if(!isset($_SESSION)) {
    session_start();
}



function changne_data($data_to_change, $spalten_name){
    if (isset( $_SESSION["username"])){
    $host = 'localhost';
    $user = 'fawzy';
    $password = 'mypassword';
    $database = 'regestrieren';
    $db_obj = new mysqli($host, $user, $password, $database);
    $sql = "select * from `login`";
    $user_coun = 0;
    $current_user = $_SESSION["username"];
    $second_sql = "update `login` Set `$spalten_name` = '$data_to_change' where `username` = '$current_user' ";
    $stmt = $db_obj->prepare($second_sql);

    $result = $db_obj->query($sql);


    if ($result->num_rows > 0) {
        //iteriert alle datensätz in der Datenbank
        while($row = $result->fetch_assoc()) {
            if ($current_user == $row["username"] ){
                $stmt->execute();
            }else{
                $user_coun ++;
            }
        }
    }


}
}

$error = "";
$success = "";

    function pw_verify($pw)
    {
        global $error;
        if (strlen($pw) < 8) {

            $error = "Password must be at least 8 characters!";
            return 0;
        } elseif (!preg_match("/[a-z]/i", $pw)) {
            $error = "Password must contain at least one letter!";
            return 0;

        } elseif (!preg_match("/[0-9]/", $pw)) {
            $error = "Password must contain at least one number!";
            return 0;
        } else {
            return 1;
            /*        header("location: new_reg_success.php");*/
            /*            header("refresh:3;url=new_reg_success.php");*/
        }

    }

//change pw
function change_pw($old_pw, $new_pw, $new_pw_confirmation,  $spalten_name){
    global $error, $success;

    if (isset( $_SESSION["username"])){
        $host = 'localhost';
        $user = 'fawzy';
        $password = 'mypassword';
        $database = 'regestrieren';
        $db_obj = new mysqli($host, $user, $password, $database);
        $hashed_pw =  password_hash($new_pw, PASSWORD_DEFAULT);

        $sql = "select * from `login`";
        $user_coun = 0;
        $current_user = $_SESSION["username"];
        $second_sql = "update `login` Set `$spalten_name` = '$hashed_pw' where `username` = '$current_user' ";
        $stmt = $db_obj->prepare($second_sql);

        $result = $db_obj->query($sql);


        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                if ($current_user == $row["username"] ){
                    // altes pw mit datenbank vergleichem
                    if (password_verify($old_pw, $row["password"])){
                        // neue pw vergleichen
                        if($new_pw == $new_pw_confirmation){
                            $stmt->execute();
                            $success = "passwort erfolgreich geändert !";

                            return 1;
                        }else{
                            $error = "Die neuen Passwörter stimmt nicht überein";
                            return 0;
                        }

                    }else{
                        $error = "Das alte Passwort stimmt nicht";
                        return 0;
                    }
                }else{
                    $user_coun ++;
                }
            }
        }else{
            return 0;
        }


    }else{
        return 0;
    }
}








if ($_SERVER["REQUEST_METHOD"] == "POST"){
    //username ändern da muss man dann session destroyen und neustarten
    if(isset($_POST["Nachname_input"])){
        changne_data($_POST["Nachname_input"], "username");
        session_unset();
        session_destroy();
    }
    //vorname ändern
    if(isset($_POST["vorname_input"])){
        changne_data($_POST["vorname_input"], "first_name");
    }

    // bday ändern
    if(isset($_POST["geburtstag_input"])){
        changne_data($_POST["geburtstag_input"], "birthday");
    }

    //mail ändern
    if(isset($_POST["mail_input"])){
        changne_data($_POST["mail_input"], "usermail");
    }
    //passwort ändern
    if(isset($_POST["altes_passwort_input"])){
        if (pw_verify($_POST["neues_passwort_input"])){
            change_pw($_POST["altes_passwort_input"],$_POST["neues_passwort_input"],$_POST["neues_passwort_confirmation_input"], "password");
        }
    }
}


// wegen username änderung
if (isset($_SESSION)){
    include_once "account.php";

}else{
    header("Refresh:0");
}
