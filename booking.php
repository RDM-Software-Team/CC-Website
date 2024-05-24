<!DOCTYPE html>
<html lang="en">
<html>

    <head>
        <title> Booking </title>
        <link rel = "stylesheet" href = 'CSS/style.css'>                
    </head>

    <body>
        <!--header-->
        <?php  include 'Header.php'; ?>

        <h2 class="headings">Internet Session Booking Form</h2>
        <!--content-->
        <div class="forms">
            <form action="£" method="post">
                <div class="form-group">
                    <label for="duration">Select Duration:</label>
                    <select id="duration" name="duration" required>
                        <option value="10">R10 for 10 minutes</opt>
                        <option value="50">R50 for 50 minutes</option>
                        <option value="100">R100 for 1 hour and 30 minutes</option>
                    </select>
                </div><br>

                <div class="form-group">
                    <label for="booking_time">Booking Time:</label>
                    <input type="time" id="booking_time" name="booking_time" required>
                </div><br>

                <div class="form-group">
                    <label for="booking_date">Booking Date:</label>
                    <input type="date" id="booking_date" name="booking_date" required>
                </div><br>

                <button type="submit">Book Now</button>
            </form>
        </div>

        <!--footer-->
        <?php include 'Footer.php'?>
    </body>
</html>