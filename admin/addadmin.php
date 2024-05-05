<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Add New Employee </title> 
    <link rel="stylesheet" href="addadmin.css">
   </head>
<body>
  <div class="wrapper">
    <h2>Add New Employee</h2>
    <form method="post" action="addadmin.inc.php">
      <div class="input-box">
        <input type="text" placeholder="Enter Employee name" name="name" required>
      </div>
      <div class="input-box">
        <input type="text" placeholder="Enter Employee Phone" name="phone" required>
      </div>
      <div class="">
        <select name="department">
          <option value="Marketing">Marketing and business development department </option>
          <option value="Design">Design department </option>
          <option value="Merchandising">Merchandising department</option>
          <option value="Cutting">Cutting department </option>
       
        </select><br><br>
      </div>
      <div class="policy">
        <input type="checkbox">
        <h3>I accept all terms & condition</h3>
      </div>
      <div class="input-box button-in">
         <button type="submit" name="submit">Add</button>
      </div>
    </form>
  </div>
</body>
</html>