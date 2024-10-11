<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</Header></title>
    <link rel="stylesheet" href="../CSS/style.css">

  </head>

  <body>
    <header>

      <div>
        <a href="admin_product.php"><img src="../Images/logo.png" width="200" height="100" alt="LOGO"></a> 
      </div>
        
      <nav>
        <ul>
          
          <li class="li">

            REQUESTS

            <div class="dropdown-content">

              <a href="sell_view.php">SELLS</a>
              <a href="repairs_view.php">REPAIRS</a>
              <a href="bookings.php">BOOKINGS</a>
                
            </div>

          </li>

          <li class="li">

            PRODUCTS

            <div class="dropdown-content">

              <a href="admin_product.php">PRODUCTS</a>
              <a href="admin.php">ADD_PRODUCTS</a>
                
            </div>

          </li>

          <li><a href="orders.php">ORDERS</a></li>
          <li><a href="report.php">REPORTS</a></li>

        </ul>
      </nav>

      <div class="cart">

        <div class="icon">
          <img src="../Images/profile.png" alt="Login">
              
          <div class="dropdown-content">
            <a href="Registration.php">Sign-Up</a>
              <a href="../logout.php">Logout</a>
          </div>
          
        </div>
      </div>

    </header>
  </body>
</html>