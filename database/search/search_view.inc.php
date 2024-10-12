<?php 

    declare (strict_types= 1);

    function check_search_errors(){

        if(isset($_SESSION["errors_search"])){

            $errors = $_SESSION["errors_search"];

            echo "<br>";

            foreach ($errors as $error){

                echo "<h3>". $error ."</h3><br>";
            }

            unset($_SESSION["errors_search"]);
        }
    }

    function search_products(array $products){

        echo "<h3>Search Results</h3>";

        if(empty($products)){

            echo "<div>";
                echo "<p> Category not Found!! </p>";
            echo "<div>";

        }else{
            
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

                                echo "</div>";
                            echo "</div>";
                        }
                    }

                echo "</div>";
                
            } else {

                echo "<h3> No products found </h3>";
            }
        }
    } 