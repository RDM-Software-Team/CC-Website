<?php
    require_once('../../Config/config.inc.php');

    if (!isset($_SESSION['schedule'])) {
        $_SESSION['schedule'] = [
            'rows' => [
                'Monday' => true,
                'Tuesday' => true,
                'Wednesday' => true,
                'Thursday' => true,
                'Friday' => true,
                'Saturday' => true,
                'Sunday' => true,
            ],
            'columns' => [
                '08:00-10:00' => true,
                '12:00-14:00' => true,
                '16:00-17:00' => true,
            ],
        ];
    }
    
    $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
    $times = ['08:00-10:00', '12:00-14:00', '16:00-17:00'];
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Manage Weekly Schedule</title>
        <link rel="stylesheet" href="../../CSS/style.css">
        <link rel="stylesheet" href="../../CSS/styles.css">
    </head>

    <body>

        <?php  include '../adminHeader.php'; ?>

        <h1>Manage Weekly Schedule</h1>
        <form action="repairs_active_deactivate.inc.php" method="post">

            <h2>Rows</h2>
            <?php foreach ($days as $day): ?>
                <label>

                    <input type="checkbox" name="row" value="<?php echo htmlspecialchars($day); ?>" 
                    <?php if ($_SESSION['schedule']['rows'][$day]) echo 'checked'; ?>>
                    <?php echo htmlspecialchars($day); ?>

                </label><br>
            <?php endforeach; ?>

            <h2>Columns</h2>
            <?php foreach ($times as $time): ?>
                <label>

                    <input type="checkbox" name="column" value="<?php echo htmlspecialchars($time); ?>" 
                    <?php if ($_SESSION['schedule']['columns'][$time]) echo 'checked'; ?>>
                    <?php echo htmlspecialchars($time); ?>

                </label><br>
            <?php endforeach; ?>

            <button type="submit">Update Schedule</button>

        </form>
    </body>
</html>