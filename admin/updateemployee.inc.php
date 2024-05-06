<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once("../db_connection.php");

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $date = $_POST['date'];
    $phone = $_POST['phone'];
    $dept = $_POST['dept'];
  

    $sql = "UPDATE employee SET name = '$name', date = '$date', phone = '$phone', department ='$dept' WHERE eid = {$_SESSION['eid']}";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Use SweetAlert for success message
        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>';
        echo '<script>';
        echo 'document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                title: "Success!",
                text: "Inventory details updated successfully!",
                icon: "success",
                confirmButtonText: "OK"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "index.php";
                }
            });
        });';
        echo '</script>';
    } else {
        // Error handling
        die(mysqli_error($conn));
    }
}
?>
