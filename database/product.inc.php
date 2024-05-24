<?php
try{
    require_once 'DBConn.inc.php';
    require_once('Config/config.inc.php');
    require_once('database/logins/login_view.inc.php');

    // Prepare SQL statement
    $query = "SELECT * FROM products";
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    // Fetch products
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Check if there are any products
    if ($products) {

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
                            if(isset($_SESSION["user_id"])){
                                echo "<form action='database/cart.inc.php' method='POST'>";
                                    echo "<input type='hidden' name='product_id' value='" . htmlspecialchars($product["product_id"]) . "'>";
                                    echo "<button type='submit'>Add To Cart</button>";
                                echo "</form>";
                            }
                        echo "</div>";
                    echo "</div>";
                }
            }
        echo "</div>";
    } else {
        echo "No products found";
    }
}catch(PDOException $e){
    die("Query Failed: ".$e->getMessage());
}