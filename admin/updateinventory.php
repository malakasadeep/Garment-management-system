<?php
session_start();
?>

<?php
include_once("dbh.inc.php");

$eid = $_GET['id'];

$sql = "SELECT * FROM inventory WHERE pid = '$eid'";


$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) { 

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
        
        <form action="update.inc.php" method="post" enctype="multipart/form-data">
            <h1>Update Inventory</h1>


            <label for="username">Item Name:</label>
            <input type="text" id="username" name="name" value="<?php echo $row['name'];?>"required>

            <label for="email">Category:</label>
            <input type="text" id="email" name="email" value="<?php echo $row[''];?>" required>

            <label for="password">Location:</label>
            <input type="text" id="password" name="password" value="<?php echo $row['category'];?>">

            <label for="confirmPassword">Confirm Password:</label>
            <input type="text" id="confirmPassword" name="confirmPassword" value="<?php echo $row['manufactur'];?>" >

            <button type="submit" name="submit">Save Changes</button>
        </form>
    </div>

    <?php
    }}
    ?>
</body>
</html>
