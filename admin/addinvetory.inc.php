<?php
session_start();
?>
<?php
include_once("../db_connection.php");

error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $cat = $_POST['cat'];
    $manufactur = $_POST['manufacture'];
    $location = $_POST['location'];
    $dop = $_POST['dop'];
    $mqty = $_POST['maxqty'];
    $cqty = $_POST['cqty'];


                $sql = "INSERT INTO inventory(pid, name, category, manufactur, location, dop, max, qty) VALUES (0, '$name', '$cat', '$manufactur', '$location', '$dop', '$mqty', '$cqty')";

                $result = mysqli_query($conn, $sql);
            
                if($result){
                    
                    // Use SweetAlert for success message
        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>';
        echo '<script>';
        echo 'document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                title: "Success!",
                text: "New Inventory Details Added Successfully!",
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