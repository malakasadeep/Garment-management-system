
<?php
$dbServer = "localhost:3307";
$dbUser = "root";
$dbPassword = "";
$dbName = "coockBooker";

$conn = mysqli_connect($dbServer, $dbUser, $dbPassword, $dbName);

if(!$conn) {
    die("Connection Failed! ". mysqli_connect_error());
}

?>