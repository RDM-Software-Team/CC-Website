<?php

    ini_set('session.use_only_cookie', 1);
    ini_set('session.use_strict_mode', 1); // seession id created by our sever

    session_set_cookie_params([
        'lifetime' => 1800, // setting up the time a cookie is live
        'domain' => 'localhost', //sever domain
        'path' => '/',
        'secure'=> true, // only https connection
        'httponly' => true // protection from XSS attack using javascript
    ]);

    session_start();

    if(isset($_SESSION["user_id"])){


        if(!isset($_SESSION['last_regeneration'])){
            reg_session_id_loggedin();
        }else{
            $interval = 60 * 30; // 30 minutes
            if(time() - $_SESSION['last_regeneration'] >= $interval){
                reg_session_id_loggedin();
            }
        }

    }else{
        if(!isset($_SESSION['last_regeneration'])){
            reg_session_id();
        }else{
            $interval = 60 * 30; // 30 minutes
            if(time() - $_SESSION['last_regeneration'] >= $interval){
                reg_session_id();
            }
        }
    }

function reg_session_id_loggedin(){

    session_regenerate_id(true);
    $userId = $_SESSION["user_id"];

    // Append the user id with session id
    $newSessionId = session_create_id();
    $sessionId = $newSessionId . "_" . $userId;
    session_id($sessionId);

    $_SESSION["last_regeneration"] = time();
}    

function reg_session_id() {
    session_regenerate_id(true);
    $_SESSION["last_regeneration"] = time(); // server time
}    