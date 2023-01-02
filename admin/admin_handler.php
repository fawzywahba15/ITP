<?php
function show_all(){
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
//zu databaser comparen
        $db_host = 'localhost';
        $db_user = 'fawzy';
        $db_password = 'mypassword';
        $database = 'regestrieren';
        $db_obj = new mysqli($db_host, $db_user, $db_password, $database);
        $sql =
            "SELECT * FROM `login`";
        $result = $db_obj->query($sql);
        if ($result->num_rows > 0) {
            //iteriert alle datensätz in der Datenbank
            while ($row = $result->fetch_assoc()) {
                /*        // sucht email
                        if ($email == $row["usermail"] ){

                            // überprüft passwort
                            if (password_verify($_POST["password"], $row["password"])){
                                session_start();
                                if ($row["admin"] == 1){
                                    $_SESSION["admin"] = true;
                                }else{
                                    $_SESSION["admin"] = false;
                                }
                                $redirect = True;
                                include "./login_proccess.php";
                                exit();
                            }else{
                                $error = "Password or Email dont match";
                            }
                        }else{
                            $error = "Password or Email dont match";
                        }*/
                echo "usremail: "; echo $row["usermail"];

                var_dump($row);
            }
        }


        $db_obj->close();

    }
}

show_all();