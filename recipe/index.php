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
      <header>Create New Recipe</header>

      <div class="progressbar">
        <div class="progress" id="progress"></div>
        <div class="progress-step progress-step-active" data-title="Basic"></div>
        <div class="progress-step" data-title="Items"></div>
        <div class="progress-step" data-title="Ingrediants"></div>
        <div class="progress-step" data-title="Steps"></div>
      </div>

      <form action="add.inc.php" method="post" enctype="multipart/form-data" class="form">
        <div class="form-step form-step-active step-zero">
            <div class="input-box">
            <label>Recipe Name: </label>
            <input type="text" name="name" required />
            </div>
            <div class="input-box">
            <label>Short Description: </label>
            <input type="text" name="description" required />
            </div>
            
            <div class="column">
                <div class="input-box">
                    <label>Prep Time:</label>
                    <input id="ing" type="number" name="prepTime" required />
                </div>
                <div class="input-box">
                    <label>Serve Time:</label>
                    <input id="itm" type="number" name="sveTime" required />
                </div>
                <div class="input-box">
                    <label>Category:</label>
                    <input id="stp" type="number" name="category" required />
                </div>
            </div>

            <div class="column">
                <div class="input-box">
                    <label>Image:</label>
                    <input type="file" id="myFile" name="pic">
                </div>
            </div>
            
            <div class="btns-group"></div>
                <a onclick="clickNext(0)" class="btn btn-next">Next</a>
            </div> 
        </div>
        
        <div class="form-step step-one">
                <div class="input-box itms">
                    <label>Items:</label>
                    <div class="column">
                        <input type="text" name="item[]" required />
                        <button class="box-control" onclick="addItembox()">+</button>
                    </div>
                </div>
              

            <div class="btns-group">
                <a onclick="clickBack(1)" class="btn btn-prev">Previous</a>
                <a onclick="clickNext(1)" class="btn btn-next">Next</a>
            </div> 
        </div>

        <div class="form-step step-two">
            <div class="input-box ings">
                <label>Ingrediants:</label>
                <div class="column">
                    <input type="text" name="ingrediant[]" required />
                    <button class="box-control" onclick="addIngrediantbox()">+</button>
                </div>
            </div>

            <div class="btns-group">
                <a onclick="clickBack(2)" class="btn btn-prev">Previous</a>
                <a onclick="clickNext(2)" class="btn btn-next">Next</a>
            </div> 
        </div>

        <div class="form-step step-tree">
            <div class="input-box stps">
                <label>Steps:</label>
                <div class="column">
                    <input type="text" name="step[]" required />
                    <button class="box-control" onclick="addStepbox(event)">+</button>
                </div>
            </div>

            <div class="btns-group">
                <a onclick="clickBack(3)" class="btn btn-prev">Previous</a>
                <button name="submit" class="sub hide">Submit</button>   
            </div>
        </div>
      </form>
    </section>
  </body>

  <script src="script.js"></script>
</html>