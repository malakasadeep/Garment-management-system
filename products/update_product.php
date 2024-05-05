<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
    <title>Document</title>
</head>

<body>

</body>

</html>

<?php
// Include your database connection script (e.g., db_connection.php)
include '../db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['product_id'], $_POST['product_name'], $_POST['price'], $_POST['description'], $_POST['quantity'], $_POST['category'])) {
        $product_id = $_POST['product_id'];
        $product_code = mysqli_real_escape_string($conn, $_POST['product_code']);
        $product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
        $price = floatval($_POST['price']);
        $description = mysqli_real_escape_string($conn, $_POST['description']);
        $quantity = intval($_POST['quantity']);
        $category = mysqli_real_escape_string($conn, $_POST['category']);

        // Check if a file is uploaded
        if (!empty($_FILES["image"]["tmp_name"])) {
            // File upload handling
            $targetDir = "uploads/"; // Directory where uploaded files will be stored
            $targetFile = $targetDir . basename($_FILES["image"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

            // Check if image file is a actual image or fake image
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if ($check !== false) {
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
            }

            // Check file size
            if ($_FILES["image"]["size"] > 2000000) {
                $uploadOk = 0;
            }

            // Allow certain file formats
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
            } else {
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
                    // File uploaded successfully, update database
                    $sql = "UPDATE products SET product_code = '$product_code', product_name = '$product_name', price = $price, description = '$description', quantity = $quantity, category = '$category', image = '$targetFile' WHERE id = $product_id";

                    if ($conn->query($sql) === TRUE) {
                        echo "<script>
                                Swal.fire({
                                    title: 'Success!',
                                    text: 'Product details updated successfully',
                                    icon: 'success',
                                    confirmButtonText: 'OK'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = 'viewone.php?id=$product_id'; // Redirect to view updated product page
                                    }
                                });
                              </script>";
                    } else {
                        echo "Error updating record: " . $conn->error;
                    }
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        } else {
            // If no file is uploaded, update other fields excluding the image
            $sql = "UPDATE products SET product_code = '$product_code', product_name = '$product_name', price = $price, description = '$description', quantity = $quantity, category = '$category' WHERE id = $product_id";

            if ($conn->query($sql) === TRUE) {
                echo "<script>
                        Swal.fire({
                            title: 'Success!',
                            text: 'Product details updated successfully',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = 'viewone.php?id=$product_id'; // Redirect to view updated product page
                            }
                        });
                      </script>";
            } else {
                echo "Error updating record: " . $conn->error;
            }
        }
    } else {
        echo "All fields are required.";
    }
} else {
    echo "Invalid request method.";
}


// Close database connection
$conn->close();
