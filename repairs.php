<?php
    require_once('Config/config.inc.php');

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
<html>

    <head>
        <title> Repairs </title>
        <link rel = "stylesheet" href = 'CSS/style.css'>
        <link rel = "stylesheet" href = 'CSS/styles.css'>
        
    </head>

    <body>
        <!--header-->
        <?php  include 'Header.php'; ?>

        
        <!--content-->
        
        <div class="forms">
            <form action="#" method="post" enctype="multipart/form-data">

                <h2>REPAIRS</h2><br><br>

                <label for="image">Upload Image:</label>
                <input type="file" id="image" name="image" accept="image/*" required><br><br>
                    

                <label for="description">Description:</label><br>
                <textarea id="description" name="description" rows="4" cols="50" required></textarea>
                    

                <table id="schedule-table">
                    <thead>
                        <tr>
                            <th>Day</th>
                            <?php foreach ($times as $time): ?>
                                <?php if ($_SESSION['schedule']['columns'][$time]): ?>

                                    <th><?php echo htmlspecialchars($time); ?></th>
                                    
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($days as $day): ?>
                            <?php if ($_SESSION['schedule']['rows'][$day]): ?>

                                <tr>
                                    <td><?php echo htmlspecialchars($day); ?></td>
                                    <?php foreach ($times as $time): ?>
                                        <?php if ($_SESSION['schedule']['columns'][$time]): ?>
                                            
                                            <td><input type="radio" name="<?php echo htmlspecialchars($day); ?>"></td>

                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </tr>

                            <?php endif; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <script src="Javascript/booking_time_rule.js"></script>


                <button type="submit">Submit</button>

            </form>
        </div>
        
        <!--footer-->
        <?php include 'Footer.php'?>

    </body>
</html>