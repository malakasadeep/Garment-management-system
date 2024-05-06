
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once("../db_connection.php");

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $date = $_POST['date'];
    $dept = $_POST['department'];
 

    $sql = "INSERT INTO employee(eid, name, date, phone, department) VALUES (0, '$name', '$date', '$phone', '$dept')";

    $result = mysqli_query($conn, $sql);

    if($result){
		// Use SweetAlert for success message
        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>';
        echo '<script>';
        echo 'document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                title: "Success!",
                text: "Employee Added successfully!",
                icon: "success",
                confirmButtonText: "OK"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "index.php";
                }
            });
        });';
        echo '</script>';
        }
        else{
            die(mysqli_error($conn));
        }
}
?>