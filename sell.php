<!DOCTYPE html>
<html lang="en">
<html>

    <head>
        <title> Selling </title>
        <link rel = "stylesheet" href = 'CSS/style.css'>                
    </head>

    <body>
        <!--header-->
        <?php  include 'Header.php'; ?>

        <h2 class="headings">Sell Products Form</h2>
        <!--content-->
        <div class="forms">
        
            <form action="sell.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="front_image">Front Image:</label>
                    <input type="file" id="front_image" name="front_image" accept="image/*" required>
                </div><br>

                <div class="form-group">
                    <label for="back_image">Back Image:</label>
                    <input type="file" id="back_image" name="back_image" accept="image/*" required>
                </div><br>

                <div class="form-group">
                    <label for="aerial_image">Aerial Image:</label>
                    <input type="file" id="aerial_image" name="aerial_image" accept="image/*" required>
                </div><br>

                <div class="form-group">
                    <label for="description">Description:</label><br>
                    <textarea id="description" name="description" rows="4" cols="50" required></textarea>
                </div><br>

                <div class="form-group">
                    <label for="price">Price:</label>
                    <input type="number" id="price" name="price" min="0" step="0.01" required>
                </div><br>

                <button type="submit">Sell</button>
            </form>
        </div>

        <!--footer-->
        <?php include 'Footer.php'?>
    </body>
</html>