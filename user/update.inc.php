<?php
session_start();
?>

<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once("../db_connection.php");

if (isset($_POST['submit'])) {
    $newname = $_POST['name'];
    $newemail = $_POST['email'];
    $newPassword = $_POST['confirmPassword'];

    $sql = "UPDATE user SET name = '$newname', email = '$newemail', password = '$newPassword' WHERE uid = {$_SESSION['uid']}";

    $result = mysqli_query($conn, $sql);

    if ($result) {

        header('Location: index.php');
    } else {
        die(mysqli_error($conn));
    }
}
?>