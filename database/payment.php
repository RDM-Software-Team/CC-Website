<?php
require_once "DBConn.inc.php";
require_once "../Config/config.inc.php";

if (!isset($_GET['order_id'])) {
    echo "No order ID provided.";
    exit();
}

$order_id = $_GET['order_id'];

try {
    // Fetch order details
    $stmt = $pdo->prepare("SELECT * FROM orders WHERE order_id = ?");
    $stmt->execute([$order_id]);
    $order = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$order) {
        echo "Order not found.";
        exit();
    }

    // Handle form submission
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $payment_type = $_POST['payment_type'];

        // Create a new payment record
        $stmt = $pdo->prepare("INSERT INTO payments (paymet_type, order_id) VALUES (?, ?)");
        $stmt->execute([$payment_type, $order_id]);

        // Update cart status to 'completed'
        $stmt = $pdo->prepare("UPDATE carts SET status = 'completed' WHERE cart_id = ?");
        $stmt->execute([$order['cart_id']]);

        echo "Payment successful! Order placed.";
        exit();
    }

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Payment</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <!--header-->
    <?php include 'Header.php'; ?>

    <h1>Complete Payment for Order #<?php echo $order_id; ?></h1>
    <p>Total Price: R <?php echo $order['totalPrice']; ?></p>

    <form method="POST">
        <label for="payment_type">Select Payment Method:</label><br>
        <input type="radio" id="credit_card" name="payment_type" value="Credit Card" required>
        <label for="credit_card">Credit Card</label><br>
        <input type="radio" id="paypal" name="payment_type" value="PayPal" required>
        <label for="paypal">PayPal</label><br>
        <input type="radio" id="bank_transfer" name="payment_type" value="Bank Transfer" required>
        <label for="bank_transfer">Bank Transfer</label><br><br>
        
        <button type="submit">Pay Now</button>
    </form>

    <!--footer-->
    <?php include 'Footer.php'; ?>
</body>
</html>