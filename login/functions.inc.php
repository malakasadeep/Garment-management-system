<?php

    include_once("dbh.inc.php");

    function validateUser($conn, $email) {
        $isExist = false;

        $sql = "SELECT * FROM user WHERE email = '{$email}'";

        $result = mysqli_query($conn, $sql);

        if($result){
            if(mysqli_num_rows($result) == 1){
  
              $user = mysqli_fetch_assoc($result);
              $_SESSION['id'] = $user['c_id'];
              $_SESSION['name'] = $user['name'];
              $_SESSION['email'] = $user['email'];
              
              $isExist = true;
            header("Location: user.php");          
          }
            
          else{
  
            echo '<script>alert("Incorrect Username Or Password")</script>';
  
          }
     }


    }

?>