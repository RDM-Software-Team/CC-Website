<!DOCTYPE html>
<html lang="en">
<html>

    <head>
        <title> Repairs </title>
        <link rel = "stylesheet" href = 'CSS/style.css'>                
    </head>

    <body>
        <!--header-->
        <?php  include 'Header.php'; ?>

        <h2 class="headings">REPAIRS</h2>
        <!--content-->
        <div class="forms">
            <form action="#" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="image">Upload Image:</label>
                    <input type="file" id="image" name="image" accept="image/*" required>
                </div><br>

                <div class="form-group">
                    <label for="description">Description:</label><br>
                    <textarea id="description" name="description" rows="4" cols="50" required></textarea>
                </div><br>

                <div class="form-group">
                    <label for="date_booking">Date Booking:</label>
                    <input type="date" id="date_booking" name="date_booking" required>
                </div><br>

                <button type="submit">Submit</button>
            </form>
        </div>
        
        <!--footer-->
        <?php include 'Footer.php'?>
    </body>
</html>