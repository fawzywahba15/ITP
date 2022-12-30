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

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    //username ändern da muss man dann session destroyen und neustarten
    if(isset($_POST["Nachname_input"])){
        changne_data($_POST["Nachname_input"], "username");
        session_unset();
        session_destroy();
        header("Refresh:0");

    }
    //vorname ändern
    if(isset($_POST["vorname_input"])){
        changne_data($_POST["vorname_input"], "first_name");
    }

    // bday ändern
    if(isset($_POST["geburtstag_input"])){
        changne_data($_POST["geburtstag_input"], "birthday");
    }

}



if (isset($_SESSION)){

    include_once "account.php";

}else{
    echo "bin in";

    header("Refresh:5");
}
