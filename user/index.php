<?php 
session_start();

include_once("dbh.inc.php");
 
$user = $_SESSION['name'];
$uid = $_SESSION['uid'];

$sql = "SELECT * FROM user WHERE uid = {$uid}";

$result = mysqli_query($conn, $sql);
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CoockBooker</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
</head>

<body>

  <div class="container">
    <nav class="hidden">
      <ul>
        <li><a href="#" class="logo">
          <img src="images/guli.png" alt="">
          <span class="nav-item"><?php echo $user;?></span>
        </a></li>
        <li><a href="/Garment-management-system/user/userprofile.php" class="nav-link">
          <i class="fas fa-home"></i>
          <span class="nav-item">Home</span>
        </a></li>
        <li><a href="/Online_Recipe_Management_System/user" class="nav-link active">
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
        <h1>Manage Recipes</h1>
        <i class="fa fa-pencil-square"></i>

      </div>
      <div class="main-skills">
        <div class="card">
        <i class="fa fa-plus-square"></i>
          <h3>Add New Recipe</h3>
          <p>Join Over 1 million Students.</p>
          <a href="/Online_Recipe_Management_System/recipe" class="butt">Get Started</a>
        </div>
        <div class="card">
          <i class="fa fa-heart"></i>
          <h3>Favourite Recipes</h3>
          <p>Join Over 3 million Students.</p>
          <a href="/recipe/add.inc.php" class="butt">Get Started</a>
        </div>
        <div class="card">
          <i class="fas fa-palette"></i>
          <h3>Messages</h3>
          <p>Join Over 2 million Students.</p>
          <a href="./Online_Recrecipe/add.inc.php" class="butt">Get Started</a>
        </div>
      </div>

      <section class="main-course">
        <h1>My Recipes</h1>
        <div class="course-box">
          <div class="course">


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