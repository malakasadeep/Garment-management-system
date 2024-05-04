<?php
session_start();
?>
<?php
include_once("dbh.inc.php");

error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $info = $_POST['description'];
    $prepTime = $_POST['prepTime'];
    $serveTime = $_POST['sveTime'];
    $cat = $_POST['category'];

    $uid = $_SESSION['uid'];

    $item = $_POST['item'];
    $ingrediants = $_POST['ingrediant'];
    $step = $_POST['step'];

    $file_name = $_FILES['pic']['name'];
    $file_type = $_FILES['pic']['type'];
    $file_size = $_FILES['pic']['size'];
    $temp_name = $_FILES['pic']['tmp_name'];
    $file_path = time().$file_name;

    $row[] = 0;
    $itm = ' ';

    $sql = array(
                "INSERT INTO recipe(rid, name, description, prepTime, servetTime, category, image, uid) VALUES(0, '$name', '$info', '$prepTime', '$serveTime', '$cat', '$file_path', '$uid')",
                "SELECT rid FROM recipe ORDER BY rid DESC LIMIT 1",
                "INSERT INTO recipe_item(rid, item) VALUES('$row[0]', '$itm')"
                );
       

    if (move_uploaded_file($temp_name, 'images/'.$file_path)) {
        
        for ($i = 0; $i < 3; $i++) {
            if ($i == 0) {
                $result1 = mysqli_query($conn, $sql[$i]);
            }
            if ($i == 1) {
                $result2 = mysqli_query($conn, "SELECT rid FROM recipe ORDER BY rid DESC LIMIT 1");
                $row = mysqli_fetch_array($result2);

                
            }

            if ($i == 2){
                foreach($item as $itm) {
                    $result3 = mysqli_query($conn, "INSERT INTO recipe_item(rid, item) VALUES('$row[0]', '$itm')");
                }
                foreach($ingrediants as $ing) {
                    $result3 = mysqli_query($conn, "INSERT INTO recipe_ingrediant(rid, ingrediant) VALUES('$row[0]', '$ing')");
                }
                foreach($step as $stp) {
                    $result3 = mysqli_query($conn, "INSERT INTO recipe_step(rid, step) VALUES('$row[0]', '$stp')");
                }
            }
        }
        header("Location: /Online_Recipe_Management_System/user"); 
    }
    
    echo $result3;

}

?>