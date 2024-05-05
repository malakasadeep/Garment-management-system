<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
include 'db_connection.php';

// Check if the ID parameter is set in the URL
if(isset($_GET['id'])) {
    // Sanitize the ID parameter to prevent SQL injection
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    
    // Delete the item from the database based on the ID
    $query = "DELETE FROM products WHERE id = '$id'";
    $result = mysqli_query($conn, $query);

    if($result) {
        // Deletion successful
        echo "<script>
                Swal.fire({
                    title: 'Success!',
                    text: 'Item deleted successfully',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '../admin/index.php'; // Redirect to index.php
                    }
                });
              </script>";
    } else {
        // Error occurred while deleting the item
        echo "<script>
                Swal.fire({
                    title: 'Error!',
                    text: 'Failed to delete item',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
              </script>";
    }
} else {
    // Handle case where no ID parameter is provided
    echo "Item ID not provided";
    exit();
}

// Close database connection
mysqli_close($conn);
?>
