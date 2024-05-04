
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once("dbh.inc.php");
include_once("functions.inc.php");

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
 

    $sql = "INSERT INTO user(uid, name, email, password) VALUES (0, '$name', '$email', '$pass')";

    $result = mysqli_query($conn, $sql);

    if($result){
		
        header('Location: index.php');
        }
        else{
            die(mysqli_error($conn));
        }
}
?>