<?php
session_start();
?>

<?php
include_once("dbh.inc.php");

$eid = $_GET['id'];
$_SESSION['eid'] = $eid;

$sql = "SELECT * FROM employee WHERE eid = '$eid'";


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
        
        <form action="updateemployee.inc.php" method="post" enctype="multipart/form-data">
            <h1>Update Inventory</h1>


            <label for="username">Employee Name:</label>
            <input type="text" id="username" name="name" value="<?php echo $row['name'];?>"required>

            <label for="email">Date:</label>
            <input type="date" id="email" name="date" value="<?php echo $row['date'];?>" required>

            <label for="password">Phone:</label>
            <input type="text" id="password" name="phone" value="<?php echo $row['phone'];?>">

            <label for="confirmPassword">Department:</label>
            <input type="text" id="confirmPassword" name="dept" value="<?php echo $row['department'];?>" >


            <button type="submit" name="submit">Save Changes</button>
        </form>
    </div>

    <?php
    }}
    ?>
</body>
</html>
