
<?php
$dbServer = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "garment";

$conn = mysqli_connect($dbServer, $dbUser, $dbPassword, $dbName);

if(!$conn) {
    die("Connection Failed! ". mysqli_connect_error());
}

?>