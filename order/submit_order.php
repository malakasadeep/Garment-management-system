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
session_start();
// Include your database connection script
include '../db_connection.php';

// Retrieve user ID from session
$uid = $_SESSION['uid'];

// Retrieve other order details from the form
$product_id = $_POST['product_id'];
$product_name = $_POST['product_name'];
$product_price = $_POST['product_price'];
$name = $_POST['name'];
$email = $_POST['email'];
$address = $_POST['address'];
$payment_method = $_POST['payment_method'];
$quantity = $_POST['quantity'];
$total_price = $_POST['total_price'];

// Insert the order into the database
$query = "INSERT INTO orders (user_id, product_id, product_name, product_price, name, email, address, payment_method, quantity, total_price) 
          VALUES ('$uid', '$product_id', '$product_name', '$product_price', '$name', '$email', '$address', '$payment_method', '$quantity', '$total_price')";

if (mysqli_query($conn, $query)) {
    // Order inserted successfully
    // Display SweetAlert notification
    echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Order Placed!',
                text: 'Your order has been successfully placed.',
                showConfirmButton: false,
                timer: 2000
            }).then(() => {
                // Redirect to another page after the alert closes (optional)
                window.location.href = '../user/index.php';
            });
         </script>";
} else {
    // Error inserting order
    echo "Error placing order: " . mysqli_error($conn);
}

// Close database connection
mysqli_close($conn);
?>