<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Order</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
</head>

<body>

</body>

</html>

<?php
// Include your database connection script (e.g., db_connection.php)
include '../db_connection.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $order_id = $_POST['id'];
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $payment_method = $_POST['payment_method'];
    $quantity = $_POST['quantity'];
    $total_price = $_POST['total_price'];

    // Update the order in the database
    $query = "UPDATE orders 
              SET product_id = '$product_id', 
                  product_name = '$product_name', 
                  product_price = '$product_price', 
                  name = '$name', 
                  email = '$email', 
                  address = '$address', 
                  payment_method = '$payment_method', 
                  quantity = '$quantity', 
                  total_price = '$total_price' 
              WHERE id = $order_id";

    if (mysqli_query($conn, $query)) {
        // Order updated successfully
        // Display SweetAlert notification
        echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: 'Order details updated successfully.',
                    showConfirmButton: false,
                    timer: 2000
                }).then(() => {
                    // Redirect to another page after the alert closes
                    window.location.href = '../user/index.php';
                });
             </script>";
    } else {
        // Error updating order
        echo "Error updating order: " . mysqli_error($conn);
    }
} else {
    // Invalid request method
    echo "Invalid request method.";
}

// Close database connection
mysqli_close($conn);
?>