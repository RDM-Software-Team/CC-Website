<?php

    declare (strict_types= 1);

    function get_products(object $pdo, string $productSearch) {
    
        $query = "SELECT * FROM products WHERE category = :psearch;";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":psearch", $productSearch);
        $stmt->execute();
        
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $products;

    }