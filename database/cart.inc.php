<?php

    require_once "DBConn.inc.php";
    require_once "../Config/config.inc.php";

    if (!isset($_SESSION["user_id"])) {
        header("Location: ../login.php");
        die();
    }

    $customer_id = $_SESSION["user_id"];
    $product_id = $_POST['product_id'];
    $action = $_POST['action'];
    $cart_created = date('Y-m-d H:i:s');

    try {
        // Start transaction
        $pdo->beginTransaction();

        //ERROR HANDLERS

        // Check if the customer already has an active cart
        $stmt = $pdo->prepare("SELECT cart_id FROM carts WHERE customer_id = ? AND status = 'active'");
        $stmt->execute([$customer_id]);
        $cart = $stmt->fetch(PDO::FETCH_ASSOC);

        // Create a new cart if none exists
        if (!$cart) {
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

        // Update quantity if the product is already in the cart. OR remove the product from cart.
        if ($cart_item) {
            
            if ($action == 'increase') {

                $stmt = $pdo->prepare("UPDATE cart_items SET quantity = quantity + 1 WHERE cart_id = ? AND product_id = ?");
                $stmt->execute([$cart_id, $product_id]);

            } elseif ($action == 'decrease' && $cart_item['quantity'] > 1) {

                $stmt = $pdo->prepare("UPDATE cart_items SET quantity = quantity - 1 WHERE cart_id = ? AND product_id = ?");
                $stmt->execute([$cart_id, $product_id]);
            }
        } else {
            if ($action == 'increase') {

                $stmt = $pdo->prepare("INSERT INTO cart_items (cart_id, product_id, quantity) VALUES (?, ?, 1)");
                $stmt->execute([$cart_id, $product_id]);
            }
        }

        // Commit transaction
        $pdo->commit();

        // Redirect back to the previous page
        header("Location: " . $_SERVER['HTTP_REFERER']);
        die();

    } catch (PDOException $e) {
        $pdo->rollBack();
        // Send a simple error response
        echo json_encode(["status" => "error", "message" => $e->getMessage()]);
        die();
    }