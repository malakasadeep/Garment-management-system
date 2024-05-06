<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
</head>

<body>

</body>

</html>
<?php
// Include your database connection script (e.g., db_connection.php)
include '../db_connection.php';

// Check if the order ID is provided in the URL parameters
if (isset($_GET['id'])) {
    $order_id = $_GET['id'];

    // Delete the order from the database
    $query = "DELETE FROM orders WHERE id = $order_id";

    if (mysqli_query($conn, $query)) {
        // Order deleted successfully
        // Display SweetAlert notification
        echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: 'Order deleted successfully.',
                    showConfirmButton: false,
                    timer: 2000
                }).then(() => {
                    // Redirect to the index page after the alert closes
                    window.location.href = '../user/index.php';
                });
             </script>";
    } else {
        // Error deleting order
        echo "Error deleting order: " . mysqli_error($conn);
    }
} else {
    // Handle case where order ID is not provided
    echo "Order ID not provided.";
}

// Close database connection
mysqli_close($conn);
