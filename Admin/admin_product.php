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

        <?php include 'adminProducts/products_admin.inc.php' ?>

    </body>  
</html>