<?php
    require_once '../database/DBConn.inc.php';
    require_once '../Config/config.inc.php';

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Get form data
        $productName = $_POST['product_name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $category = $_POST['category'];

        // Handle file upload
        if (isset($_FILES['images']) && $_FILES['images']['error'][0] == UPLOAD_ERR_OK) {
            $image = $_FILES['images']['tmp_name'][0];
            $imageType = pathinfo(path: $_FILES['images']['name'][0], flags: PATHINFO_EXTENSION);
            
            // Only allow JPEG or PNG formats
            if ($imageType === 'jpg' || $imageType === 'jpeg' || $imageType === 'png') {

                $imageData = file_get_contents(filename: $image);
                $imageBase64 = base64_encode(string: $imageData);

            } else {

                echo "Unsupported image format. Please upload JPEG or PNG images.";
                exit();
            }
        } else {

            echo "Image upload failed.";
            exit();
        }

        try {

            // Prepare SQL statement to insert product
            $query = "INSERT INTO products (pName, discription, price, category, images) VALUES (:pName, :description, :price, :category, :images)";
            $stmt = $pdo->prepare(query: $query);
            $stmt->bindParam(param: ':pName', var: $productName);
            $stmt->bindParam(param: ':description', var: $description);
            $stmt->bindParam(param: ':price', var: $price);
            $stmt->bindParam(param: ':category', var: $category);
            $stmt->bindParam(param: ':images', var: $imageBase64);
            
            // Execute the query
            $stmt->execute();

            // Redirect back to the admin product page
            echo "<script type='text/javascript'>

                    alert('Product has been successfully added!');
                    window.location.href = 'Admin.php';

                </script>";
            exit();
            
        } catch (PDOException $e) {

            die("Error: " . $e->getMessage());
        }
    } else {

        echo "Invalid request method.";
    }