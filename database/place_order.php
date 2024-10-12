<?php
    require_once "DBConn.inc.php";
    require_once "../Config/config.inc.php";

    if (!isset($_SESSION["user_id"])) {

        header("Location: login.php");
        die();
    }

    $customer_id = $_SESSION["user_id"];

    try {

        // Fetch active cart
        $stmt = $pdo->prepare("SELECT cart_id FROM carts WHERE customer_id = ? AND status = 'active'");
        $stmt->execute([$customer_id]);
        $cart = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$cart) {

            echo "No active cart found.";
            exit();
        }

        $cart_id = $cart['cart_id'];

        // Calculate total price of cart
        $stmt = $pdo->prepare("SELECT SUM(products.price * cart_items.quantity) AS total_price 
                            FROM cart_items 
                            JOIN products ON cart_items.product_id = products.product_id 
                            WHERE cart_items.cart_id = ?");
        $stmt->execute([$cart_id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $totalPrice = $result['total_price'];

        // Create a new order
        $order_date = date('Y-m-d');
        $stmt = $pdo->prepare("INSERT INTO orders (custumer_name, order_Date, totalPrice, customer_id, cart_id) 
                            VALUES (?, ?, ?, ?, ?)");
        $stmt->execute(['Mthokozisi', $order_date, $totalPrice, $customer_id, $cart_id]);
        $order_id = $pdo->lastInsertId();

        // Redirect to payment page
        header("Location: payment.php?order_id=$order_id");
        die();

    } catch (PDOException $e) {
        
        echo "Error: " . $e->getMessage();
    }