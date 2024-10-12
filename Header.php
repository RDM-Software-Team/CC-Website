<?php
    require_once('Config/config.inc.php');
    require_once('database/logins/login_view.inc.php');
?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><Header></Header></title>
    <link rel="stylesheet" href="CSS/style.css">
  </head>

  <body>
    <header>

      <div>

        <a href="Home.php"><img src="Images/logo.png" width="200" height="100" alt="LOGO"></a> 

      </div>
        
      <nav>
        <ul>

          <li><a href="home.php">HOME</a></li>
          <li><a href="products.php">PRODUCTS</a></li>
          <li><a href="services.php">SERVICES</a></li>
          <li><a href="About.php">ABOUT</a></li>

        </ul>
      </nav>

      <div class="cart icon">

        <?php if(isset($_SESSION["user_id"])){ 

          output_username();?>
          <a href="cart.php"><img src="Images/cart.png" alt="Shopping Cart"></a>

            <img src="Images/profile.png" alt="Login">
                
            <div class="dropdown-content">

              <a href="profile.php">Profile</a>
              <a href="logout.php">Logout</a>
              
            </div>

        <?php } ?>

        <?php if(!isset($_SESSION["user_id"])){ 
          output_username();?>
          
          <div class="icon">

            <img src="Images/profile.png" alt="Login">
                
            <div class="dropdown-content">

              <a href="Registration.php">Sign-Up</a>
              <a href="Login.php">Log-In</a>

            </div>

          </div>
        <?php } ?> <br>

      </div>
    </header>
  </body>
</html>