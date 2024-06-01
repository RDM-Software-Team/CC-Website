<?php

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $productSearch = $_POST["productsearch"];

        try{
            require_once "../DBConn.inc.php";
            require_once "search_model.inc.php";
            require_once "search_contr.inc.php";

            $errors = [];
            $products = get_products($pdo, $productSearch);

            // Error handlers
            if (empty($products)) {
                $errors["no_product"] = "Product not found";
            }

            // Call our session
            require_once('../../Config/config.inc.php');

            if ($errors) {
                $_SESSION["errors_search"] = $errors;
            } else {
                $_SESSION["search_results"] = $products;
            }

            header("Location: ../../products.php");
            die();
   
        }catch(PDOException $e){

            die("Query Failed: ".$e->getMessage());
        }
    }else{

        header("Location: ../../products.php");
    }