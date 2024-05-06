<?php
// Include your database connection script (e.g., db_connection.php)
include '../db_connection.php';

// Check if product ID is provided in the URL parameters
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch product details based on the product ID
    $query = "SELECT * FROM orders WHERE id = $id"; // Assuming your table name is 'orders'
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Assign retrieved data to variables
        $product_code = $row['product_id']; // Change 'product_id' to the actual column name for product ID
        $product_name = $row['product_name']; // Change 'product_name' to the actual column name for product name
        $price = $row['product_price']; // Change 'product_price' to the actual column name for product price
        $customer_name = $row['name']; // Change 'customer_name' to the actual column name for customer name
        $customer_email = $row['email']; // Change 'customer_email' to the actual column name for customer email
        $delivery_address = $row['address']; // Change 'delivery_address' to the actual column name for delivery address
        $payment_method = $row['payment_method']; // Change 'payment_method' to the actual column name for payment method
        $quantity = $row['quantity']; // Change 'quantity' to the actual column name for quantity
        $total_price = $row['total_price']; // Change 'total_price' to the actual column name for total price
    } else {
        // Handle case where no order is found with the provided product ID
        echo "No order found with the provided product ID.";
    }
} else {
    // Handle case where product ID is not provided
    echo "Product ID not provided.";
}

// Close database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Order</title>
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
        <h2>Update Order</h2>
        <form action="update.php" method="post" id="orderForm">
            <input type="text" id="id" name="id" value="<?php echo $id; ?>" readonly hidden>
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
            <input type="text" id="name" name="name" value="<?php echo $customer_name; ?>" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $customer_email; ?>" required>

            <!-- Include delivery information -->
            <label for="address">Delivery Address:</label>
            <input type="text" id="address" name="address" value="<?php echo $delivery_address; ?>" required>

            <!-- Selection for payment method -->
            <label for="payment_method">Payment Method:</label>
            <select id="payment_method" name="payment_method" required>
                <option value="credit_card" <?php echo ($payment_method === 'credit_card') ? 'selected' : ''; ?>>Credit Card</option>
                <option value="paypal" <?php echo ($payment_method === 'paypal') ? 'selected' : ''; ?>>PayPal</option>
                <!-- Add more payment methods if needed -->
            </select>

            <!-- Quantity input field -->
            <!-- Wrap the Quantity input and Total Price input inside a container -->
            <div class="input-row">
                <label for="quantity">Quantity:</label>
                <input type="number" id="quantity" name="quantity" value="<?php echo $quantity; ?>" min="1" required>

                <!-- Display total price -->
                <label for="total_price">Total Price:</label>
                <input type="text" id="total_price" name="total_price" value="<?php echo $total_price; ?>" readonly>
            </div>

            <!-- Add more form fields as needed -->

            <!-- Submit button -->
            <button type="submit">Update Order</button>
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

        <!-- Button to cancel and go back to the previous page -->
    </div>
</body>

</html>