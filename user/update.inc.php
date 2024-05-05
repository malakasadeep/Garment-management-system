<?php
session_start();
?>

<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once("dbh.inc.php");

if (isset($_POST['submit'])) {
    $newname = $_POST['name'];
    $newemail = $_POST['email'];
    $newPassword = $_POST['confirmPassword'];

    $file_name = $_FILES['pic']['name'];
    $file_type = $_FILES['pic']['type'];
    $file_size = $_FILES['pic']['size'];
    $temp_name = $_FILES['pic']['tmp_name'];
    
    $file_path = time() . $file_name; // Path to the images folder


    // Move the uploaded file to the "images" folder
    move_uploaded_file($temp_name, $file_path);

    $sql = "UPDATE user SET name = '$newname', email = '$newemail', password = '$newPassword', image='$file_path' WHERE uid = {$_SESSION['uid']}";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header('Location: index.php');
    } else {
        die(mysqli_error($conn));
    }
}
?>