<?php
<<<<<<< HEAD:database/DBConn.inc.php

    $dsn = "mysql:host=localhost;dbname=computer_complex";
    $dbusername = "root";
    $dbpassword = "cS4FJ?";
=======
    $dhost = "sql309.infinityfree.com";
    $dname ="if0_36608597_computer_complexdb";
    $dbusername = "if0_36608597";
    $dbpassword = "ComputerComplex";
>>>>>>> ac16d479c14b84c4f7ddac1e41b5f8c95a9db316:Database/DBConn.php

    try{
        $dsn = "mysql:host=$dhost;dbname=$dname";
        $pdo = new PDO($dsn, $dbusername, $dbpassword);                 //connection to database
        echo "Connected :) ";
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  //error handling
    }catch(PDOException $e) {
        echo "Connection failed: ". $e->getMessage();                   //error output
    }