<?php 
   include_once("dbh.inc.php");

   $id = $_GET['id'];

   error_reporting(E_ALL);
   ini_set('display_errors', 1);  
   
   $sql = array(
              "SELECT * FROM recipe_ingrediant WHERE rid=$id",
              "SELECT * FROM recipe_item WHERE rid = $id"
            );
   
   for ($i=0; $i<2; $i++) {
    if($i == 0) {
      $result = mysqli_query($conn, $sql[$i]);
    }
    if($i == 1) {
      $result2 = mysqli_query($conn, $sql[$i]);
    }
   }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="view.css">
    <title>Document</title>
</head>
<body>

<div class='recipe-card'>
  <div style="background:url(https://d2gk7xgygi98cy.cloudfront.net/6267-3-large.jpg) no-repeat 50% 50%; background-size:cover; height: 150px"></div>
  <div class="recipe-card__body">
    <h1 class="recipe-card__heading">Oatmeal Cookies</h1>
    <h2 class="recipe-card__subhead">Crunchy around the edges, softer in the center, these oatmeal cookies feature the nutty taste and nubbly texture of oats. </h2>
    
    <ul class="recipe-card__nav">
      <li>
        <h3 onclick="change()" class="active">Ingredients</h3>
      </li>
      <li>
      <h3 onclick="change()">Method</h3>
      </li>
    </ul>
    
    <ul class="recipe-card__ingredients">
      <?php
          if(mysqli_num_rows($result) > 0) {
          while($row = mysqli_fetch_assoc($result)) {
            echo      '<li>'. $row['ingrediant']. '</li>';
          }
        };
      ?>  
    </ul>

    <ul class="recipe-card__ingredients hide">
      <?php
          if(mysqli_num_rows($result2) > 0) {
          while($row = mysqli_fetch_assoc($result2)) {
            echo      '<li>'. $row['item']. '</li>';
          }
        };
      ?>  
    </ul>
  </div>
</div>
    
</body>
</html>