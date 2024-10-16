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

    /*
    <?php
// PHP Data Objects(PDO) Sample Code:
try {
    $conn = new PDO("sqlsrv:server = tcp:disappdd.database.windows.net,1433; Database = ComputerCmplex", "st10107568", "{your_password_here}");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

// SQL Server Extension Sample Code:
$connectionInfo = array("UID" => "st10107568", "pwd" => "{your_password_here}", "Database" => "ComputerCmplex", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:disappdd.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);
?>
    */ //PASSWORD dianaK1209$