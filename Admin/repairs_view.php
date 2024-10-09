<?php
require_once '../database/DBConn.inc.php';
require_once "../Config/config.inc.php";  

// Check if an admin action was taken (accept or decline)
if (isset($_POST['action']) && isset($_POST['repair_id'])) {
    $repair_id = $_POST['repair_id'];
    $action = $_POST['action'];
    
    // Update status based on the action
    if ($action == 'accept') {
        $sql = "UPDATE repairs SET status = 'Accepted' WHERE repair_id = :repair_id";
    } elseif ($action == 'decline') {
        $sql = "UPDATE repairs SET status = 'Declined' WHERE repair_id = :repair_id";
    }

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':repair_id', $repair_id);

    if ($stmt->execute()) {
        echo "<script>alert('Repair request updated successfully');</script>";
    } else {
        echo "<script>alert('Error updating repair request');</script>";
    }
}

// Fetch all pending repair requests
$sql = "SELECT * FROM repairs WHERE status = 'Pending'";
$stmt = $pdo->query($sql);
$repairs = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<html>
    <head>
        <title> Admin Repairs View </title>
        <link rel="stylesheet" href="CSS/admin_styles.css">
    </head>
    <body>
        <!--header-->
        <?php include 'AdminHeader.php'; ?>

        <!--content-->
        <div class="admin-repairs">
            <h2>Pending Repair Requests</h2><br>

            <table border="1">
                <thead>
                    <tr>
                        <th>Repair ID</th>
                        <th>Customer ID</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Booked Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($repairs as $repair): ?>
                    <tr>
                        <td><?php echo $repair['repair_id']; ?></td>
                        <td><?php echo $repair['customer_id']; ?></td>
                        <td><?php echo htmlspecialchars($repair['description']); ?></td>
                        <td>
                            <img src="data:image/jpeg;base64,<?php echo $repair['image']; ?>" alt="Repair Image" width="100">
                        </td>
                        <td><?php echo $repair['booked_date']; ?></td>
                        <td>
                            <form method="post" action="repairs_view.php">
                                <input type="hidden" name="repair_id" value="<?php echo $repair['repair_id']; ?>">
                                <button type="submit" name="action" value="accept">Accept</button>
                                <button type="submit" name="action" value="decline">Decline</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>


    </body>
</html>
