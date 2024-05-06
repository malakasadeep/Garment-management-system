<?php
session_start();
?>

<?php
include_once("../db_connection.php");
$sql = "SELECT * FROM user WHERE uid = {$_SESSION['uid']}";

$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="update.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
</head>
<body>
    <div class="container">
        <nav class="hidden">
            <ul>
            <li><a href="#" class="logo">
                <span class="nav-item"><?php echo $user['name'];?></span>
              </a></li>
              <li><a href="index.php" class="nav-link">
                <i class="fas fa-home"></i>
                <span class="nav-item">Home</span>
              </a></li>
              <li><a href="userprofile.php" class="nav-link">
                <i class="fas fa-user"></i>
                <span class="nav-item">Profile</span>
              <li><a href="" class="nav-link active">
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
         

          <form action="update.inc.php" method="post" enctype="multipart/form-data">
            <h1>Edit Profile</h1>


            <label for="username">Username:</label>
            <input type="text" id="username" name="name" value="<?php echo $user['name'];?>"required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>" required>

            <label for="password">New Password:</label>
            <input type="password" id="password" name="password" value="<?php echo $user['password']; ?>">

            <label for="confirmPassword">Confirm Password:</label>
            <input type="password" id="confirmPassword" name="confirmPassword" value="<?php echo $user['password']; ?>" >

            <button type="submit" name="submit">Save Changes</button>
        </form>
        <a href="deleteuser.inc.php" style="background-color: red; width: 80px; height: 60px; color: black; border-radius: 10px;">Delete Profile</a>
    </div>
</body>
</html>