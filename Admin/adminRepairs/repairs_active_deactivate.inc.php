<?php
    require_once('../../Config/config.inc.php');

        // Initialize the schedule if it's not set
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

    // Handle POST requests
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Deactivate or activate row if requested
        if (isset($_POST['row'])) {
            $day = $_POST['row'];
            if ($_SESSION['schedule']['rows'][$day]) {
                $_SESSION['schedule']['rows'][$day] = false;
            } else {
                $_SESSION['schedule']['rows'][$day] = true;
            }
        }

        // Deactivate or activate column if requested
        if (isset($_POST['column'])) {
            $time = $_POST['column'];
            if ($_SESSION['schedule']['columns'][$time]) {
                $_SESSION['schedule']['columns'][$time] = false;
            } else {
                $_SESSION['schedule']['columns'][$time] = true;
            }
        }
    }


    header('Location: admins_repairs.inc.php');
    exit();