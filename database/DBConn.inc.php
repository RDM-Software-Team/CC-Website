<?php

    $dsn = 'mysql:host=localhost;dbname=computer_complex';
    $dbusername = 'root';
    $dbpassword = 'cS4FJ?';

    try{

        $pdo = new PDO(dsn: $dsn, username: $dbusername, password: $dbpassword);          //connection to database
        $pdo->setAttribute(attribute: PDO::ATTR_ERRMODE, value: PDO::ERRMODE_EXCEPTION);  //error handling

    }catch(PDOException $e) {

        echo "Connection failed: ". $e->getMessage();                   //error output
    }