<?php

session_start();
// Include your database connection script (e.g., db_connection.php)
include '../db_connection.php';

// Retrieve product details from URL parameters
if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

    // Fetch product details based on the product ID (you can modify this query as per your database schema)
    $query = "SELECT * FROM products WHERE id = '$product_id'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $product_code = $row['product_code'];
        $product_name = $row['product_name'];
        $price = $row['price'];
    } else {
        // Handle case where no item is found with the provided ID
        echo "No item found with ID: " . $id;
        exit();
    }
} else {
    // Handle case where no ID parameter is provided
    echo "Item ID not provided";
    exit();
}

// Close database connection
mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
    background-color: rgba(128, 0, 128, 0.2); /* Purple color with 50% opacity */
    border-radius: 8px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    padding: 20px;
}

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="email"],
        input[type="number"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }

        .input-row {
            display: flex;
            align-items: center;
            /* Align items vertically in the center */
        }

        .input-row label {
            margin-right: 10px;
            /* Add spacing between label and input */
        }

        .input-row input {
            flex: 1;
            /* Expand input to fill remaining space */
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Order Page</h2>
        <form action="submit_order.php" method="post" id="orderForm">
            <!-- Include read-only fields for product details -->
            <label for="product_id">Product ID:</label>
            <input type="text" id="product_id" name="product_id" value="<?php echo $product_code; ?>" readonly>

            <!-- You can fetch product name and price from the database and display them here -->
            <!-- Replace $product_name and $product_price with the actual variables holding the product name and price -->
            <label for="product_name">Product Name:</label>
            <input type="text" id="product_name" name="product_name" value="<?php echo $product_name; ?>" readonly>

            <label for="product_price">Product Price:</label>
            <input type="text" id="product_price" name="product_price" value="<?php echo $price; ?>" readonly>

            <!-- Include form fields for customer details -->
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <!-- Include delivery information -->
            <label for="address">Delivery Address:</label>
            <input type="text" id="address" name="address" required>

            <!-- Selection for payment method -->
            <label for="payment_method">Payment Method:</label>
            <select id="payment_method" name="payment_method" required>
                <option value="credit_card">Credit Card</option>
                <option value="paypal">PayPal</option>
                <!-- Add more payment methods if needed -->
            </select>

            <!-- Quantity input field -->
            <!-- Wrap the Quantity input and Total Price input inside a container -->
            <div class="input-row">
                <label for="quantity">Quantity:</label>
                <input type="number" id="quantity" name="quantity" value="1" min="1" required>

                <!-- Display total price -->
                <label for="total_price">Total Price:</label>
                <input type="text" id="total_price" name="total_price" readonly>
            </div>


            <!-- Add more form fields as needed -->

            <!-- Submit button -->
            <button type="submit">Place Order</button>
        </form>

        <script>
            // Function to calculate total price based on product price and quantity
            function calculateTotalPrice() {
                // Get product price and quantity
                var productPrice = parseFloat(document.getElementById('product_price').value);
                var quantity = parseInt(document.getElementById('quantity').value);

                // Calculate total price
                var totalPrice = productPrice * quantity;

                // Update total price input field
                document.getElementById('total_price').value = totalPrice.toFixed(2); // Format to two decimal places
            }

            // Calculate total price when quantity changes
            document.getElementById('quantity').addEventListener('input', calculateTotalPrice);

            // Initial calculation on page load
            calculateTotalPrice();
        </script>


    </div>
</body>

</html>