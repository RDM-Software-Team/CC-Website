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
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f2f2f2;
        }

        .payment-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        label {
            margin: 10px 0;
            display: block;
        }

        .dropdown {
            display: none;
            margin: 15px 0;
        }

        .dropdown input {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const paymentInputs = document.querySelectorAll('input[name="payment_type"]');
            const creditCardDropdown = document.getElementById('credit_card_dropdown');
            const paypalDropdown = document.getElementById('paypal_dropdown');
            const bankTransferDropdown = document.getElementById('bank_transfer_dropdown');

            paymentInputs.forEach(input => {
                input.addEventListener('change', function () {
                    // Hide all dropdowns initially
                    creditCardDropdown.style.display = 'none';
                    paypalDropdown.style.display = 'none';
                    bankTransferDropdown.style.display = 'none';

                    // Show the specific dropdown based on the selected radio button
                    if (this.id === 'credit_card') {
                        creditCardDropdown.style.display = 'block';
                    } else if (this.id === 'paypal') {
                        paypalDropdown.style.display = 'block';
                    } else if (this.id === 'bank_transfer') {
                        bankTransferDropdown.style.display = 'block';
                    }
                });
            });
        });
    </script>
</head>
<body>

    <div class="payment-container">
        <h1>Complete Payment for Order #<?php echo $order_id; ?></h1>
        <p>Total Price: R <?php echo $order['totalPrice']; ?></p>

        <form method="POST">
            <label for="payment_type">Select Payment Method:</label>
            <input type="radio" id="credit_card" name="payment_type" value="Credit Card" required>
            <label for="credit_card">Credit Card</label>

            <div id="credit_card_dropdown" class="dropdown">
                <input type="text" name="card_number" placeholder="Card Number" required>
                <input type="text" name="card_name" placeholder="Cardholder Name" required>
                <input type="text" name="expiry_date" placeholder="Expiry Date (MM/YY)" required>
                <input type="text" name="cvv" placeholder="CVV" required>
            </div>

            <input type="radio" id="paypal" name="payment_type" value="PayPal" required>
            <label for="paypal">PayPal</label>

            <div id="paypal_dropdown" class="dropdown">
                <input type="email" name="paypal_email" placeholder="PayPal Email" required>
            </div>

            <input type="radio" id="bank_transfer" name="payment_type" value="Bank Transfer" required>
            <label for="bank_transfer">Bank Transfer</label>

            <div id="bank_transfer_dropdown" class="dropdown">
                <input type="text" name="account_holder" placeholder="Account Holder Name" required>
                <input type="text" name="account_number" placeholder="Account Number" required>
                <input type="text" name="bank_name" placeholder="Bank Name" required>
            </div>

            <button type="submit">Pay Now</button>
        </form>
    </div>

</body>
</html>
