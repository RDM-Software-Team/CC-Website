<?php
    $dhost = "sql309.infinityfree.com";
    $dname ="if0_36608597_computer_complexdb";
    $dbusername = "if0_36608597";
    $dbpassword = "ComputerComplex";

    try{
        $dsn = "mysql:host=$dhost;port=3306;dbname=$dname";
        $pdo = new PDO($dsn, $dbusername, $dbpassword);                 //connection to database
        echo "Connected :) ";
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  //error handling
    }catch(PDOException $e) {
        echo "Connection failed: ". $e->getMessage();                   //error output
    }