<?php

    require_once('Config/config.inc.php');
    require_once('database/registration/signup_view.inc.php');
    
?>

<!DOCTYPE html>
<html lang="en">
    
    <head>
        <title> Register </title>
        <link rel = "stylesheet" href = 'CSS/style.css'>
        <script src="Javascript/validation.js"></script>          
    </head>

    <body>

        <!--header-->
        <?php  include 'Header.php'; ?>

        <!--form-->
        <div class="forms">
            <form action="database/registration/signup.inc.php" method="POST" </form> <!--onsubmit="return validatePhoneNumber()"-->

                <h2>SIGN-UP</h2> <br><br>

                <?php signup_inputs() ?>
                
                <button type="submit">Register</button>

                <!--Error handler messages-->
                <?php
                    check_signup_error();
                ?>

            </form>

        </div>

        <!--footer-->
        <?php include 'Footer.php'?>

    </body>
</html>