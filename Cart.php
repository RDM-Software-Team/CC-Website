<?php

require_once "database/DBConn.inc.php";
require_once "Config/config.inc.php";


if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

$customer_id = $_SESSION["user_id"];

try {
    // Fetch the active cart for the customer
    $stmt = $pdo->prepare("SELECT cart_id FROM carts WHERE customer_id = ? AND status = 'active'");
    $stmt->execute([$customer_id]);
    $cart = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($cart) {
        $cart_id = $cart['cart_id'];

        // Fetch the cart items
        $stmt = $pdo->prepare("SELECT products.product_id, products.pName, products.discription, products.price, products.images, cart_items.quantity 
                               FROM cart_items 
                               JOIN products ON cart_items.product_id = products.product_id
                               WHERE cart_items.cart_id = ?");
        $stmt->execute([$cart_id]);
        $cart_items = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $cart_items = [];
    }

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>

<!DOCTYPE html>
<html lang="en">

    <head>
    <title> Cart </title>
        <link rel = "stylesheet" href = 'CSS/style.css'>                
    </head>

    <body>
        <!--header-->
        <?php  include 'Header.php'; ?>

        <!--content-->
        <h1>Shopping Cart</h1>
        <?php if (empty($cart_items)){ ?>
            <p>Your cart is empty.</p>

        <?php }else{ 

            // Initialize total amount
            $totalAmount = 0;?>
            
                <?php foreach ($cart_items as $item){ ?>
                    
                    <div class='cart-item'>
                        <img src='data:image/jpeg;base64,<?php echo base64_encode($item["images"]); ?>' alt='Image'>
                        <p><?php echo htmlspecialchars($item["pName"]); ?></p>
                        <div class='cart-item-info'>
                            <div class='cart-item-details'>
                                <p><?php echo htmlspecialchars($item["discription"]); ?></p>
                                <p>R <?php echo htmlspecialchars($item["price"]); ?></p>
                                <p>Quantity: <?php echo htmlspecialchars($item["quantity"]); ?></p>
                            </div>
                            <div class='cart-item-actions'>
                                <form action="database/remove_from_cart.inc.php" method="POST">
                                    <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($item["product_id"]); ?>">
                                    <button type="submit">Remove</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php // Add product price to total amount
                    $totalAmount += htmlspecialchars($item['price']);
                }?>

                <!-- Display total amount -->
            <div id='total-amount'>
            Total Amount: R <span id='total'><?php echo $totalAmount; ?></span>
            </div><br>

            <div class='cart-item-actions'>
            <button>PLACE ORDER</button>
            </div><br>

        <?php }?>

        <!--footer-->
        <?php include 'Footer.php'?>
    </body>
</html>