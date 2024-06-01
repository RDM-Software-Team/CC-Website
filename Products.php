<!DOCTYPE html>
<html lang="en">

    <head>
    <title> PRODUCTS </title>
        <link rel = "stylesheet" href = 'CSS/style.css'>     
        
        <!--  jQuery library -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <!-- ajax code for the, add to cart, button. This allows the a customer to add products to 
        cart page without redirecting them to the another page or reloading the page -->
        <script>
            $(document).ready(function() {
                $(".add-to-cart").click(function() {
                    var productId = $(this).data("product-id");

                    $.ajax({
                        type: "POST",
                        url: "database/cart.inc.php",
                        data: {
                            product_id: productId,
                            action: "increase"
                        },
                        success: function(response) {
                            try {
                                var result = JSON.parse(response.trim()); // Parse the JSON response
                                if (result.status === "failed") {
                                    alert("Error adding item to cart: " + result.message);
                                } else {
                                    alert("Item added to cart successfully!");
                                }
                            } catch (e) {
                                console.error("Invalid JSON response:", response);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error("Error adding item to cart: ", error);
                        }
                    });
                });
            });
        </script>
    </head>

    <body>
        
        <!--header-->
        <?php  include 'Header.php'; ?>

        <div>
            <ul>
                <?php include 'searching.php' ?> <br>
            </ul>
        </div>

        <!--content-->
        <?php
            if (isset($_SESSION["search_results"])) {

                $products = $_SESSION["search_results"];
                search_products($products);
                unset($_SESSION["search_results"]);
            }else{
                check_search_errors();
                include 'database/product.inc.php';
            }
        ?>
        
        <!--footer-->
        <?php include 'Footer.php'?>

    </body>  
</html>