<?php

    require_once "DBConn.inc.php";
    require_once "../Config/config.inc.php";

    if (!isset($_SESSION["user_id"])) {
        header("Location: ../login.php");
        exit();
    }

    $customer_id = $_SESSION["user_id"];
    $product_id = $_POST['product_id'];
    $cart_created = date('Y-m-d H:i:s');

    try {
        // Start transaction
        $pdo->beginTransaction();

        // Check if the customer already has an active cart
        $stmt = $pdo->prepare("SELECT cart_id FROM carts WHERE customer_id = ? AND status = 'active'");
        $stmt->execute([$customer_id]);
        $cart = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$cart) {
            // Create a new cart if none exists
            $stmt = $pdo->prepare("INSERT INTO carts (customer_id, cart_created, status) VALUES (?, ?, 'active')");
            $stmt->execute([$customer_id, $cart_created]);
            $cart_id = $pdo->lastInsertId();
        } else {
            $cart_id = $cart['cart_id'];
        }

        // Check if the product is already in the cart
        $stmt = $pdo->prepare("SELECT * FROM cart_items WHERE cart_id = ? AND product_id = ?");
        $stmt->execute([$cart_id, $product_id]);
        $cart_item = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($cart_item) {
            // Update quantity if the product is already in the cart
            $stmt = $pdo->prepare("UPDATE cart_items SET quantity = quantity + 1 WHERE cart_id = ? AND product_id = ?");
            $stmt->execute([$cart_id, $product_id]);
        } else {
            // Add new product to the cart
            $stmt = $pdo->prepare("INSERT INTO cart_items (cart_id, product_id, quantity) VALUES (?, ?, 1)");
            $stmt->execute([$cart_id, $product_id]);
        }

        // Commit transaction
        $pdo->commit();

        // Redirect to the cart page
        header("Location: ../cart.php");
        exit();

    } catch (PDOException $e) {
        // Rollback transaction if something failed
        $pdo->rollBack();
        echo "Error: " . $e->getMessage();
    }  