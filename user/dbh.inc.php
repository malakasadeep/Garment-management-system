
<?php
$serverName="localhost:3307";
$dbUsername="admin2";
$dbPassword="1234";
$dbName = "coockBooker";

$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

if(!$conn) {
    die("Connection Failed! ". mysqli_connect_error());
}

?>