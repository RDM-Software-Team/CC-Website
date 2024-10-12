<?php

    require_once('Config/config.inc.php');
    require_once('database/search/search_view.inc.php');
    
?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SEARCH</Header></title>
    <link rel="stylesheet" href='CSS/style.css'>
  </head>

  <body>

    <div> <!-- SEARCH -->
      <form class="cart img" action="database/search/search.inc.php" method="POST">

        <ul>
          <input type="text" id="productsearch" name="productsearch" placeholder="Category Search....">
        </ul>

        <button type="submit">SEARCH</button>

      </form>

    </div>
  </body>
</html>