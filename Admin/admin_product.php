<!DOCTYPE html>
<html lang="en">

    <head>
    <title> PRODUCTS </title>
        <link rel = "stylesheet" href = '../CSS/style.css'>                
    </head>

    <body>
        <!--header-->
        <?php  include 'adminHeader.php'; ?>

        <div>
            <ul>
                <?php include '../searching.php' ?> <br>
            </ul>
        </div>

        <!--content-->

        <?php
            if (isset($_SESSION["search_results"])) {

                $products = $_SESSION["search_results"];
                search_products(products: $products);
                unset($_SESSION["search_results"]);

            }else{
                
                check_search_errors();
                include 'adminProducts/products_admin.inc.php';
            }
        ?>

    </body>  
</html>