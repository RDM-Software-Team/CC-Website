<?php
    session_start();
    require_once '../../database/DBConn.inc.php';

    // Check if the admin is logged in
    if (!isset($_SESSION["user_id"])) {

        header(header: "Location: ../login.php");
        exit();
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Get the product_id from the form
        $product_id = $_POST['product_id'];

        if ($product_id) {
            try {
                // Prepare the delete query
                $query = "DELETE FROM products WHERE product_id = ?";
                $stmt = $pdo->prepare(query: $query);

                // Execute the delete query
                $stmt->execute(params: [$product_id]);

                // Redirect back to the products admin page
                header(header: "Location: ../admin_product.php");
                exit();

            } catch (PDOException $e) {

                die("Error: " . $e->getMessage());
            }
        } else {

            echo "Invalid product ID.";
        }
    } else {

        echo "Invalid request.";
    }