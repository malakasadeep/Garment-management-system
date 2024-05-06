<?php
session_start();
?>

<?php
include_once("../db_connection.php");

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
                    <span class="nav-item"><?php echo $user['name'];?></span>
                </a></li>
                <li><a href="index.php" class="nav-link">
                    <i class="fas fa-home"></i>
                    <span class="nav-item">Home</span>
                </a></li>
                <li><a href="#"  class="nav-link active">
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

        

        <div class="profile-details">
        
        <div class="profile-details">
        
        <div class="user-details" style="padding: 90px; ">
        <h1>User Profile</h1><br/><br/>
            <p><strong>Username:</strong> <br/> <?php echo $user['name']; ?></p>
            <p><strong>Email:</strong> <br/> <?php echo $user['email']; ?></p>
            <p><strong>Password:</strong> <br/> <?php echo $user['password']; ?></p>
        </div>
    </div>

    </div>
</body>
</html>