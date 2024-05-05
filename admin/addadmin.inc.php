
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once("dbh.inc.php");

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $dept = $_POST['department'];
 

    $sql = "INSERT INTO employee(eid, name, date, phone, department) VALUES (0, '$name', 0, '$phone', '$dept')";

    $result = mysqli_query($conn, $sql);

    if($result){
		
        header('Location: index.php');
        }
        else{
            die(mysqli_error($conn));
        }
}
?>