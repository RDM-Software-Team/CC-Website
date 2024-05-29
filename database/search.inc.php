<?php

        if($_SERVER["REQUEST_METHOD"] == "POST"){
        $productSearch = $_POST["productsearch"];

        try{
            require_once "DBConn.inc.php";
        
            $query = "SELECT * FROM products WHERE category = :psearch;";
        
            $stmt = $pdo->prepare($query);

            $stmt->bindParam(":psearch", $productSearch);

            $stmt->execute();

            $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
            $pdo = null;
            $stmt = null;
        
        }catch(PDOException $e){
            die("Query Failed: ".$e->getMessage());
        }
    }else{
        header("Location: ../Home.php");
    }

?>

<!--serach output-->
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>SEARCH</title>
        <link rel = "stylesheet" href = '../CSS/style.css'>
    </head>

    <body>

        <?php include("../Header.php"); ?>

        <h3>Search Results</h3>

        <?php
            if(empty($products)){
                echo "<div>";
                    echo "<p> Category not Found!! </p>";
                echo "<div>";
            }else{
        ?>
                <?php if ($products) {

                    $groupedProducts = [];
                    foreach ($products as $product) {
                        $category = $product["category"];
                        $groupedProducts[$category][] = $product;
                    }

                    echo "<div class='category'>";
                    foreach ($groupedProducts as $category => $productsInCategory) {
                        echo "<h2>$category</h2>"; // Output heading with category name

                        // Extract unique product names within each category
                        $uniqueProductNames = array_unique(array_column($productsInCategory, 'pName'));

                        // Output each unique product within the category
                        foreach ($uniqueProductNames as $productName) {
                            // Find the first occurrence of the product with this name within the category
                            $product = array_values(array_filter($productsInCategory, function($item) use ($productName) {
                                return $item['pName'] === $productName;
                            }))[0];
        
                            // Output each product as a div
                            echo "<div class='products'>";
                            echo "<div class='product'>";
                            echo "<img src='data:image/jpeg;base64,". base64_encode($product["images"]) ."' alt='Image'>";
                            echo "<p>" . htmlspecialchars($product["pName"]). "<p>";
                            echo "<p>" . htmlspecialchars($product["discription"]). "<p>";
                            echo "<p>R " . htmlspecialchars($product["price"]). "<p>";
                            echo "</div>";
                            echo "</div>";
                        }
                    }
                    echo "</div>";
                } else {
                    echo "No products found";
                }?>
      <?php }?>      
        
    </body>
</html>