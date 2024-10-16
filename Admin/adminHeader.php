<?php 
    
    require_once('../Config/config.inc.php');
    require_once('../database/logins/login_view.inc.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <link rel="stylesheet" href="../CSS/admin_style.css">
  </head>
  <body>
    <header>

      <div>
        
        <a href="admin_product.php"><img src="../Images/logo.png" width="200" height="100" alt="LOGO"></a> 

      </div>

      <nav>
        <ul>

          <li>REQUESTS
            <div class="dropdown-content">

              <a href="sell_view.php">SELL</a>
              <a href="repairs_view.php">REPAIR</a>
              <a href="bookings.php">BOOKING</a>

            </div>
          </li>

          <li>REVIEW
            <div class="dropdown-content">

              <a href="sell_reviews.php">SELL</a>
              <a href="repairs_review.php">REPAIR</a>
              <a href="booking_review.php">BOOKING</a>

            </div>
          </li>
          
          <?php
            // Restrict access based on department
            if (isset($_SESSION["department"]) && $_SESSION["department"] === 'Owner') { ?>

              <li>PRODUCT
                <div class="dropdown-content">

                  <a href="admin.php">ADD_PRODUCTS</a>
                  <a href="admin_product.php">REMOVE_PRODUCTS</a>

                </div>
              </li> 
              <?php
            }
          ?>

          <li><a href="orders.php">ORDERS</a></li>

          <li><a href="report.php">REPORTS</a></li>

        </ul>
      </nav>

      <nav>
        <ul>
          <div class="cart">
            <div class="icon">
              <li>

                <img src="../Images/profile.png" alt="Login">

                <div class="dropdown-content">

                  <a href="Registration.php">Sign-Up</a>
                  <a href="../logout.php">Logout</a>

                </div>

              </li>
            </div>
          </div>
        </ul>
      </nav>
      
    </header>
  </body>
</html>
