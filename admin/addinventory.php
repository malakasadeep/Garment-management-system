<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="add.css" />
  </head>
  <body>
    <section class="container">
      <header>Add New Inventory</header>

      <div class="progressbar">
        <div class="progress" id="progress"></div>
        <div class="progress-step progress-step-active" data-title="Basic"></div>
        <div class="progress-step" data-title="Items"></div>
      </div>

      <form action="addinvetory.inc.php" method="post" class="form">
        <div class="form-step form-step-active step-zero">
            <div class="input-box">
            <label>Item Name: </label>
            <input type="text" name="name" required />
            </div>
            <div class="input-box">
            <label>Category: </label>
            <input type="text" name="cat" required />
            </div>
            
            <div class="column">
                <div class="input-box">
                    <label>Manufacture:</label>
                    <input id="ing" type="number" name="manufacture" required />
                </div>
                <div class="input-box">
                    <label>Location:</label>
                    <input id="itm" type="number" name="location" required />
                </div>
            </div>
            
            <div class="btns-group"></div>
                <a onclick="clickNext(0)" class="btn btn-next">Next</a>
            </div> 
        </div>

        <div class="form-step step-one">
            <div class="input-box stps">
                <label>Production Date:</label>
                <div class="column">
                    <input type="date" name="dop" required />
                    
                </div>
            </div>
            <div class="input-box stps">
                <label>Maximum Quantity:</label>
                <div class="column">
                    <input type="number" name="maxqty" required />
                    
                </div>
            </div>
            <div class="input-box stps">
                <label>Current Quantity:</label>
                <div class="column">
                    <input type="number" name="cqty" required />
                    
                </div>
            </div>

            <div class="btns-group">
                <a onclick="clickBack(1)" class="btn btn-prev">Previous</a>
                <button name="submit" class="sub hide">Submit</button>   
            </div>
        </div>
      </form>
    </section>
  </body>

  <script src="script.js"></script>
</html>