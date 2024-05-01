<!DOCTYPE html>
<html lang="en">
    
    <head>
        <title> Register </title>
        <link rel = "stylesheet" href = 'CSS/style.css'>                
    </head>

    <body>

        <!--header-->
        <?php  include 'Header.php'; ?>

        <!--form-->
        <div>
            <form action="#" method="POST">

                <h2>SIGN-UP</h2> <br><br>

                <div>
                    <input type="text" id="firstName" name="firstName" placeholder="Name" required>
                </div> <br>

                <div>
                    <input type="text" id="lastName" name="lastName" placeholder="Surname" required>
                </div> <br>

                <div>
                    <input type="email" id="email" name="email" placeholder="Email" required>
                </div> <br>

                <div>
                    <input type="number" id="phone" name="phone" placeholder="Contact" required>
                </div> <br>

                <div>
                    <input type="text" id="address" name="address" placeholder="Address" required>
                </div> <br>

                <div>
                    <input type="password" id="password" name="password" placeholder="Password" required>
                </div> <br>
                <div>
                    <input type="password" id="verify_password" name="verify_password" placeholder="verify Password" required>
                </div> <br>
                <button type="submit">Register</button>

            </form>
        </div>

        <!--footer-->
        <?php include 'Footer.php'?>

    </body>
</html>