<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel = "stylesheet" href = 'CSS/style.css'> 
</head>
<body>
<?php  include 'Header.php'; ?>

    <h2>Add Product</h2>
    <div class="forms">
    <form action="add_product.php" method="post" enctype="multipart/form-data">
        <label for="product_name">Product Name:</label>
        <input type="text" id="product_name" name="product_name" required><br>

        <label for="description">Description:</label>
        <textarea id="description" name="description" rows="4" required></textarea><br><br>

        <label for="price">Price:</label>
        <input type="number" id="price" name="price" min="0" step="0.01" required><br><br>

        <label for="category">Category:</label>
        <select id="category" name="category" required>
            <option value="">Select Category</option>
            <option value="Electronics">Electronics</option>
            <option value="Clothing">Clothing</option>
            <option value="Books">Books</option>
            <!-- Add more options as needed -->
        </select><<br><br>

        <label for="images">Images:</label>
        <input type="file" id="images" name="images[]" accept="image/*" multiple required><br><br>
        <small>Upload one or more images (JPEG, PNG, or GIF format).</small><br><br>

        <button type="submit">Add Product</button>
    </form>
    </div>

    <?php include 'Footer.php'?>
</body>
</html>