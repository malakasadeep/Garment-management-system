<?php
// Include your database connection script (e.g., dbh.php)
include '../db_connection.php';

// Check if the ID parameter is set in the URL
if (isset($_GET['id'])) {
    // Sanitize the ID parameter to prevent SQL injection
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    // Fetch data from the database based on the ID
    $query = "SELECT * FROM products WHERE id = '$id'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $product_code = $row['product_code'];
        $product_name = $row['product_name'];
        $price = $row['price'];
        $description = $row['description'];
        $quantity = $row['quantity'];
        $category = $row['category'];
        $image = $row['image'];
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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
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
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            animation: fadeIn 0.5s ease;
        }

        .details-container {
            display: flex;
            flex-wrap: wrap;
        }

        .image-container {
            flex-basis: 30%;
            margin-right: 20px;
        }

        .image-container img {
            max-width: 100%;
            border-radius: 8px;
        }

        .product-details {
            flex-basis: 65%;
        }

        h2 {
            color: #333;
            font-size: 24px;
            margin-bottom: 10px;
        }

        p {
            color: #666;
            margin-bottom: 15px;
        }

        .price {
            color: #00aa00;
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .btn-container {
            margin-top: 20px;
        }

        .btn-container button {
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            margin-right: 10px;
            transition: background-color 0.3s;
        }

        .btn-container button:hover {
            background-color: #45a049;
        }

        /* Animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            justify-content: space-between;
            max-width: 1200px;
            margin: 50px auto;
            padding: 20px;
        }

        .left-side,
        .right-side {
            flex-basis: calc(50% - 10px);
        }

        .square-container {
            width: 200px;
            height: 200px;
            background-color: #fff;
            border: 2px solid #00aa00;
            border-radius: 8px;
            padding: 20px;
        }

        .square-container h2 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .square-container p {
            margin-bottom: 5px;
        }

        .square-container p span {
            font-weight: bold;
        }

        .update-btn,
        .delete-btn {
            display: block;
            width: 100%;
            padding: 10px 0;
            margin-top: 20px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .update-btn:hover,
        .delete-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="left-side">
            <div class="image-container">
                <img src="<?php echo $image; ?>" alt="Product Image">
            </div>
        </div>
        <div class="right-side">
            <div class="product-details">
                <h2><?php echo $product_name; ?></h2>
                <p><strong>Product Code:</strong> <?php echo $product_code; ?></p>
                <p><strong>Price:</strong> $<?php echo $price; ?></p>
                <p><strong>Description:</strong> <?php echo $description; ?></p>
                <p><strong>Quantity:</strong> <?php echo $quantity; ?></p>
                <p><strong>Category:</strong> <?php echo $category; ?></p>
                <div class="btn-container">
                    <button onclick="window.location.href='update.php?id=<?php echo $id; ?>'">Update</button>
                    <button onclick="window.location.href='delete.php?id=<?php echo $id; ?>'">Delete</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>