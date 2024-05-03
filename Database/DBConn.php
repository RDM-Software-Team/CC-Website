<?php

    $dsn = "mysql:host=localhost;dname:computer_complex";
    $dbusername = "root";
    $dbpassword = "cS4FJ?";

    try{
        $pdo = new PDO($dsn, $dbusername, $dbpassword);                 //connection to database
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  //error handling
    }catch(PDOException $e) {
        echo "Connection failed: ". $e->getMessage();                   //error output
    }