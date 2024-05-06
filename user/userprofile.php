<?php
session_start();
?>

<?php
include_once("dbh.inc.php");

// Fetch user details from the database based on the session
$sql = "SELECT * FROM user WHERE uid = {$_SESSION['uid']}";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="update.css">
    <link rel="stylesheet" href="userprofile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
    
</head>
<body>
    <div class="container">
        <nav class="hidden">
            <ul>
                <li><a href="#" class="logo">
                    <img src="/logo.jpg" alt="">
                    <span class="nav-item"><?php echo $user['name'];?></span>
                </a></li>
                <li><a href="" class="nav-link">
                    <i class="fas fa-home"></i>
                    <span class="nav-item">Home</span>
                </a></li>
                <li><a href="" class="nav-link">
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

        

        <div class="profile-details">
        <h1>User Profile</h1>
            <div class="user-details">
                <p><strong>Username:</strong> <?php echo $user['name']; ?></p>
                <p><strong>Email:</strong> <?php echo $user['email']; ?></p>
                <p><strong>Password:</strong> <?php echo $user['password']; ?></p>
            </div>
        </div>
    </div>
</body>
</html>
