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
          <li><a href="bookings.php">VIEW_BOOKINGS</a></li>
          <li><a href="Products.php">PRODUCTS</a></li>
          <li><a href="orders.php">VIEW_ORDERS</a></li>
          <li><a href="Admin.php">ADD_PRODUCTS</a></li>
          <li><a href="report.php">REPORTS</a></li>
        </ul>
      </nav>

      <div class="cart">

        <div class="icon">
          <img src="Images/profile.png" alt="Login">
              
          <div class="dropdown-content">
            <a href="Registration.php">Sign-Up</a>
              <a href="Login.php">Log-In</a>
          </div>
          
        </div>
      </div>

    </header>

    <div>
      <ul>
        <?php include 'searching.php' ?> <br>
      </ul>
    </div>

  </body>
</html>