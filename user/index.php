<?php
session_start();

include_once("../db_connection.php");

$user = $_SESSION['name'];
$uid = $_SESSION['uid'];

$sql = "SELECT * FROM orders WHERE user_id = {$uid}";

$result = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Garment</title>
  <!-- ======= Styles ====== -->
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
</head>

<body>

  <div class="container">
    <nav class="hidden">
      <ul>
        <li><a href="#" class="logo">
            
            <span class="nav-item"><?php echo $user; ?></span>
          </a></li>
        <li><a href="index.php" class="nav-link active">
            <i class="fas fa-home"></i>
            <span class="nav-item">Home</span>
          </a></li>
        <li><a href="userprofile.php" >
            <i class="fas fa-user"></i>
            <span class="nav-item">Profile</span>
        <li><a href="update.php" class="nav-link">
            <i class="fas fa-cog"></i>
            <span class="nav-item">Settings</span>
          </a></li>
        <li><a href="" class="nav-link">
            <i class="fas fa-question-circle"></i>
            <span class="nav-item">Help</span>
          </a></li>
        <li><a href="logout.php" class="logout">
            <i class="fas fa-sign-out-alt"></i>
            <span class="nav-item">Log out</span>
          </a></li>
      </ul>
    </nav>

    <div class="main">
      <div class="main-top">
        <h1>Manage Orders</h1>
        <i class="fa fa-pencil-square"></i>

      </div>
      <div class="main-skills">
        <div class="card">
          <i class="fa fa-plus-square"></i>
          <h3>Place New Order</h3>
          <p>Join Over 1 million Users.</p>
          <a href="../order/viewallcards.php" class="butt">Make Order</a>
        </div>
        <div class="card">
          <i class="fa fa-heart"></i>
          <h3>Favourite Items</h3>
          <p>Join Over 3 million Users.</p>
          <a href="" class="butt">Get Started</a>
        </div>
        <div class="card">
          <i class="fas fa-palette"></i>
          <h3>Messages</h3>
          <p>Join Over 2 million Users.</p>
          <a href="" class="butt">Get Started</a>
        </div>
      </div>

      <section class="main-course">
        <h1>My Orders</h1>
        <div class="course-box">
          <div class="course">

            <?php
            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
                echo  '<div class="box">';
                echo      '<h3>Order ID: ' . $row['id'] . '</h3>';
                echo      '<p>Product Name: ' . $row['product_name'] . '</p>' . '<br/>';
                echo      '<p>Price: $' . $row['product_price'] . '</p>' . '<br/>';
                echo      '<p>Quantity: ' . $row['quantity'] . '</p>' . '<br/>';
                echo      '<p>Total Price: $' . $row['total_price'] . '</p>' . '<br/>';
                echo      '<p>Name: ' . $row['name'] . '</p>' . '<br/>';
                echo      '<p>Email: ' . $row['email'] . '</p>' . '<br/>';
                echo      '<p>Address: ' . $row['address'] . '</p>' . '<br/>';
                echo      '<p>Payment Method: ' . $row['payment_method'] . '</p>' . '<br/>';
                echo      '<button onclick="window.location.href=\'../order/update_order.php?id=' . $row['id']  . '\'">Edit</button>';
                echo      '<button onclick="window.location.href=\'../order/delete_order.php?id=' . $row['id']  . '\'">Delete</button>';
                echo      '</div>';
              }
            };
            ?>
          </div>
        </div>
    </div>
    </section>
  </div>

  <div class="settings">

  </div>
  </div>

</body>

</html>