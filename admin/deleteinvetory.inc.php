<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once("dbh.inc.php");

if (isset($_GET['id'])) {
    $pid = $_GET['id'];

    // SQL query to delete the inventory record
    $sql = "DELETE FROM inventory WHERE pid = $pid";

    // Execute the query
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Use SweetAlert for success message
        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>';
        echo '<script>';
        echo 'document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                title: "Success!",
                text: "Inventory record deleted successfully!",
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
