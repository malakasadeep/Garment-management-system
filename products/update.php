<?php
// Include your database connection script (e.g., db_connection.php)
include '../db_connection.php';

// Function to sanitize input data
function sanitizeInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $product_id = sanitizeInput($_GET['id']);

    // Fetch product details from the database
    $sql = "SELECT * FROM products WHERE id = $product_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Product found, pre-fill the form with existing details
        $row = $result->fetch_assoc();
        $product_code = $row['product_code'];
        $product_name = $row['product_name'];
        $price = $row['price'];
        $description = $row['description'];
        $quantity = $row['quantity'];
        $category = $row['category'];
        $image = $row['image'];
    } else {
        // Product not found
        echo "Product not found.";
        exit;
    }
} else {
    echo "Invalid request.";
    exit;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Fashion Item</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">

    <style>
        /* Reset default browser styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-image: url("img/2150885803.jpg");
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-repeat: no-repeat;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            width: 60%;
            background-color: rgba(249, 249, 249, 0.7);
            /* Transparent white background */
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            animation: fadeIn 0.5s ease;
            padding: 30px;
            border-radius: 10px;

        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            color: #008000;
            /* Green */
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="number"],
        select,
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #cccccc;
            border-radius: 5px;
            font-size: 16px;
            transition: border-color 0.3s;
        }

        select {
            appearance: none;
            background-image: url('data:image/svg+xml;utf8,<svg fill="%23000000" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M7 10l5 5 5-5z"/><path d="M0 0h24v24H0z" fill="none"/></svg>');
            background-repeat: no-repeat;
            background-position: right 10px center;
            background-size: 20px;
            padding-right: 30px;
        }

        textarea {
            resize: vertical;
        }

        button[type="submit"] {
            background-color: #008000;
            /* Green */
            color: #ffffff;
            /* White */
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button[type="submit"]:hover {
            background-color: #005000;
            /* Darker green on hover */
        }

        /* Animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 style="text-align: center; color: #008000;">Update Fashion Item</h1>
        <form action="update_product.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <input type="text" id="product_id" name="product_id" value="<?php echo $product_id; ?>" readonly hidden>
            </div>

            <div class="form-group">
                <label for="product_code">Product Code:</label>
                <input type="text" id="product_code" name="product_code" value="<?php echo $product_code; ?>" required readonly>
            </div>

            <div class="form-group">
                <label for="product_name">Product Name:</label>
                <input type="text" id="product_name" name="product_name" value="<?php echo $product_name; ?>" required>
            </div>

            <div class="form-group">
                <label for="price">Price (USD):</label>
                <input type="number" id="price" name="price" step="0.01" value="<?php echo $price; ?>" required>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea id="description" name="description" rows="4" required><?php echo $description; ?></textarea>
            </div>

            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="number" id="quantity" name="quantity" value="<?php echo $quantity; ?>" required>
            </div>

            <div class="form-group">
                <label for="category">Category:</label>
                <select id="category" name="category" required>
                    <option value="Tops" <?php if ($category == "Tops") echo "selected"; ?>>Tops</option>
                    <option value="Bottoms" <?php if ($category == "Bottoms") echo "selected"; ?>>Bottoms</option>
                    <option value="Dresses" <?php if ($category == "Dresses") echo "selected"; ?>>Dresses</option>
                    <option value="Outerwear" <?php if ($category == "Outerwear") echo "selected"; ?>>Outerwear</option>
                    <option value="Accessories" <?php if ($category == "Accessories") echo "selected"; ?>>Accessories</option>
                </select>
            </div>

            <div class="form-group">
                <label for="image">Product Image:</label>
                <input type="file" id="image" name="image" value="<?php echo $image; ?>" accept="image/*">
                <img src="<?php echo $image; ?>" alt="Product Image" width="100">
            </div>

            <button type="submit">Update Product</button>
        </form>
    </div>
</body>

</html>