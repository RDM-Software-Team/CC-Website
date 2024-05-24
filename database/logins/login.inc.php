<?php

    if($_SERVER["REQUEST_METHOD"] === "POST"){

        $email = $_POST["email"];
        $pwd = $_POST["password"];

        try{
            
            require_once "../DBConn.inc.php";
            require_once "login_model.inc.php";
            require_once "login_contr.inc.php";

            $errors = [];
            //error handlers
            if(is_input_empty($email, $pwd)){
                $errors["empty_input"] = "Fill in all fields";
            }
            
            $result = get_user($pdo, $email);

            if(is_username_wrong($result)){    
                $errors["wrong_email"] =  "Incorrect email";
            }
            
            if(!is_username_wrong($result) && is_password_wrong($pwd, $result["pwrd"])){    
                $errors["wrong_password"] = "Incorrect password!";
            }

            // Call our session
            require_once(__DIR__ . '/../../Config/config.inc.php');

            // Check if the are errors inside the array
            if($errors){
                $_SESSION["errors_login"] = $errors;
                
                header("Location: ../../login.php");
                die();
            }

            // Append the user id with session id
            $newSessionId = session_create_id();
            $sessionId = $newSessionId . "_" . htmlspecialchars($result["customer_id"]);
            session_id($sessionId);

            $_SESSION["user_id"] = $result["customer_id"];
            $_SESSION["user_name"] = htmlspecialchars($result["firstName"]);
            $_SESSION["last_regeneration"] = time(); //Reset the time

            header("Location: ../../home.php?login=sucess");
            $pdo = null;
            $stmt = null;
            die();

        }catch(PDOException $e){
            die("Query Failed: ".$e->getMessage());
        }

    }else{
        header("Location: ../../login.php");

    }