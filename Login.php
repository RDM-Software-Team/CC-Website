<!DOCTYPE html>
<html lang="en">
    <head>
        <title> Logging-In </title>
        <link rel = "stylesheet" href = 'CSS/style.css'>                
    </head>

    <body>

        <!--header-->
        <?php  include 'Header.php'; ?>

        <!--form-->
        <div>
            <form action="#" method="GET">

                <h2>Log-In</h2> <br><br>

                <div>
                    <input type="email" id="email" name="email" placeholder="Email" required>
                </div> <br>

                <div>
                    <input type="password" id="password" name="password" placeholder="Password"required>
                </div> <br>

                <button type="submit">LOG-IN</button>

            </form>
        </div>

        <!--footer-->
        <?php include 'Footer.php'?>
    </body>
</html>