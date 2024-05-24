<?php

    declare (strict_types= 1); // type declaration set true

    function input_empty(string $fName, string $lName, string $email, string $addr, string $pwd){
        if(empty($fName) || empty($lName) || empty($email) || empty($addr) || empty($pwd)){    
            return true;
        }else{
            return false;
        }
    }

    /*function email_validate(string $email){
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){    
            return true;
        }else{
            return false;
        }
    }*/

    function username_email_taken(object $pdo, string $email){
        if(get_username_email($pdo, $email)){    
            return true;
        }else{
            return false;
        }
    }

    function new_customers(object $pdo, string $fName, string $lName, string $email, int $phone, string $addr, string $pwd){
        set_customer($pdo, $fName, $lName, $email, $phone, $addr, $pwd);
    }