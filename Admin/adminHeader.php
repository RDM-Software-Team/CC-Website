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

            SERVICES

            <div class="dropdown-content">

              <a href="bookings.php">BOOKINGS</a>
              <a href="orders.php">ORDERS</a>
              <a href="adminRepairs/admins_repairs.inc.php">REPAIRS</a>
                
            </div>

          </li>

          <li><a href="admin_product.php">PRODUCTS</a></li>
          <li><a href="admin.php">ADD_PRODUCTS</a></li>
          <li><a href="#">SELLING</a></li>
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