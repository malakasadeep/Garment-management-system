<?php
// Include your database connection script (e.g., db_connection.php)
include '../db_connection.php';

// Fetch all products from the database
$query = "SELECT * FROM products";
$result = mysqli_query($conn, $query);

$products = []; // Initialize an empty array to store products

if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        // Push each product into the products array
        $products[] = $row;
    }
} else {
    // Handle case where no products are found
    echo "No products found.";
}

// Close database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View All Products</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .card {
            background-color: rgba(128, 0, 128, 0.2);
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            margin: 20px;
            width: 300px;
            padding: 20px;
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-10px);
        }

        .card img {
            max-width: 100%;
            border-radius: 8px;
        }

        .card h2 {
            color: #333;
            font-size: 20px;
            margin: 10px 0;
        }

        .card p {
            color: #666;
            font-size: 16px;
            margin-bottom: 10px;
        }

        .order-btn {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
            text-decoration: none;
            display: inline-block;
        }

        .order-btn:hover {
            background-color: #0056b3;
        }

        @media screen and (max-width: 768px) {
            .container {
                justify-content: flex-start;
            }

            .card {
                width: calc(50% - 40px);
            }
        }

        @media screen and (max-width: 480px) {
            .card {
                width: calc(100% - 40px);
            }
        }

        h1{
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>Product List</h1>
    <div class="container">

        <?php foreach ($products as $product): ?>
            <div class="card">
                <img src="../products/<?php echo $product['image']; ?>" alt="<?php echo $product['product_name']; ?>"/>
                <h2><?php echo $product['product_name']; ?></h2>
                <p><strong>Price:</strong> $<?php echo $product['price']; ?></p>
                <p><strong>Description:</strong> <?php echo $product['description']; ?></p>
                <p><strong>Category:</strong> <?php echo $product['category']; ?></p>
                <!-- Add an "Order Now" button with a link to the order page -->
                <a href="order.php?product_id=<?php echo $product['id']; ?>" class="order-btn">Order Now</a>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
